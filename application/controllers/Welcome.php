<?php


class Welcome extends CI_Controller
{

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function blog()
    {
        $this->load->view('blog');
    }

    public function post()
    {
        $this->load->view('post');
    }

    public function misstake()
    {
        $data['header'] = $this->Test_model->get_data();
        $this->load->view('test', $data);
    }

    public function crud()
    {
      //  $this->load->model('queries');
        $data['posts'] = $this->queries->getPosts();
        //print_r($posts);
        //echo '</pre';
        // exit();
        $this->load->view('crud', $data);

    }

    public function create()
    {
        // echo 'Create';
        $this->load->view('create');
    }

    public function save()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run()) {

            $data = $this->input->post();

            $today = date('Y-m-d');
            $data['data_created'] = $today;

            unset($data['submit']);

            if ($this->queries->addPost($data)) {
                $this->session->set_flashdata('msg', 'Post saved successfully');
            } else {
                $this->session->set_flashdata('msg', 'Falied to save Post!');
            }
            return redirect('welcome/crud');
            // For printing value
            /*  echo '</pre>';
              print_r($data);
              echo '</pre>';
              exit();*/
        } else {
            $this->load->view('create');

        }

    }

    public function update($id)
    {
//        $this->load->model('queries');
        $post = $this->queries->getSinglePosts($id);
        $this->load->view('update', array('post' => $post));
    }


    public function change($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run()) {
            // echo 'Success';
            $data = $this->input->post();
            // Today's date
            $today = date('Y-m-d');
            $data['data_created'] = $today;

            unset($data['submit']);

            if ($this->queries->updatePost($data, $id)) {
                $this->session->set_flashdata('msg', 'Post updated successfully');
            } else {
                $this->session->set_flashdata('msg', 'Falied to update Post!');
            }
            return redirect('welcome/crud');
            // For printing value
            /*  echo '</pre>';
              print_r($data);
              echo '</pre>';
              exit();*/
        } else {
            $this->load->view('update');
            //  echo validation_errors();
        }

    }

    public function view($id)
    {

        $post = $this->queries->getSinglePosts($id);
        $this->load->view('view', array('post' => $post));
    }

//soft_delete
    public function delete($id)
    {
        // $id = $this->input->get('id');
        //  $delete = $this->queries->delete($id);

        if ($this->queries->deletePosts($id)) {
            $this->session->set_flashdata('message', 'Data has been deleted.');
        } else {
            $this->session->set_flashdata('msg', 'Falied to delete Post!');
        }
        return redirect('welcome/crud');
    }

    /* public function delete($id){
         //echo $id;

         $this->load->model('queries');
       if($this->queries->deletePosts($id))
       {
           $this->session->set_flashdata('msg','Post delete successfully');
           }
           else{
               $this->session->set_flashdata('msg','Falied to delete Post!');
           }
         return redirect('welcome/crud');
       }*/
    public function trash($id)
    {

        $data = [
            'is_deleted' => 1,
        ];

        $post = $this->queries->updatePost($data, $id);
        if ($post) {
            redirect('Welcome/crud', 'location');
        }
    }

    public function trash_show()
    {

        $posts = $this->queries->trash_show();
        $this->load->view('trash_show', array('posts' => $posts));

    }
    public function reform($id)
    {

        $data = [
            'is_deleted' => 0,
        ];

        $post = $this->queries->updatePost($data, $id);
        if ($post) {
            redirect('Welcome/crud', 'location');
        }


    }


}
