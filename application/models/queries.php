<?php

class queries extends CI_Model
{

    public function getPosts()
    {
        $query = $this->db->get_where('crud',['is_deleted'=>0]);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function trash_show()
    {
        $query = $this->db->get_where('crud', ['is_deleted' => 1]);
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function addPost($data)
    {
        return $this->db->insert('crud', $data);
    }

    public function getSinglePosts($id)
    {
        $query = $this->db->get_where('crud', array('id' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    //soft delete
    public function deletePosts($id)
    {
        $this->db->where('id', $id);
        $updaate = $this->db->update('crud', ['is_deleted' => 1]);
        return $updaate;
    }

    public function updatePost($data, $id)
    {
        return $this->db->where('id', $id)
            ->update('crud', $data);
    }

    /* public function deletePosts($id){
    return $this->db->delete('crud',array('id'=> $id));
    }*/
}

?>