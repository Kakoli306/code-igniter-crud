<?php
class Test_model extends CI_Model {

    public function get_data(){
        $table="core_blog";
        $query = $this->db->where('core_blog_tittle','adasd');
        $query = $this->db->get($table)->result();
        return $query;

    }

}