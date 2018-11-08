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
}