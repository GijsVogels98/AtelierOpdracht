<?php


class autoload_model extends CI_Model{

    function search_autoload($title){
        $this->db->like('stamnr', $title , 'both');
        $this->db->order_by('stamnr', 'ASC');
        $this->db->limit(10);
        return $this->db->get('students')->result();
    }

}