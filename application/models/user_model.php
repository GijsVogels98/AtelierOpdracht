<?php
 class user_model extends CI_Model{
     public function register($enc_password){
        //user data array
         $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password
         );
         //insert user

         return $this->db->insert('users',$data);
     }

     //check username exists
     public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
     }
     //check email exists
     public function check_email_exists($email){
         $query = $this->db->get_where('users', array('email' => $email));
         if(empty($query->row_array())){
             return true;
         }else{
             return false;
         }
     }
}