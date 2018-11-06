<?php
	class User_model extends CI_Model {
		
		public function __construct(){
			$this->load->database(); 
		}
		
		public function get_users($slug = FALSE) { 
			
			if($slug === FALSE){
				$query = $this->db->get('users');
				return $query->result_array();
			}
			$query = $this->db->get_where('users', array('slug' => $slug));
			return $query->row_array();

		}
		
		public function register($enc_password) {
			
			$slug = url_title($this->input->post('username'));
			
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'slug' => $slug,
				'password' => $enc_password,
				'zipcode' => $this->input->post('zipcode'),
				'register_date' => $this->input->post('register_date'),
				'user_role' => 'User'
			);
			
			return $this->db->insert('users', $data);
		}
		
		public function login($username, $password) {
			
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			$result = $this->db->get('users');
			
			if ($result->num_rows() == 1) {
				return $result->row(0)->id;
			} else {
				return false;
			}
			
		}
		
		public function get_role($username, $password) {
			
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			$result = $this->db->get('users');
			
			if ($result->num_rows() == 1) {
				return $result->row(0)->user_role;
			} else {
				return false;
			}
			
		}
		
		public function check_username_exists($username) {
			
			$query = $this->db->get_where('users', array('username' => $username));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function check_email_exists($email) {
			
			$query = $this->db->get_where('users', array('email' => $email));
			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
		
		public function delete_user($id) {
			
			$this->db->where('id', $id);
			$this->db->delete('users');
			return true;
			
		}
		
		public function update_user() {
			
			$slug = url_title($this->input->post('username'));
			
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'slug' => $slug,
				'zipcode' => $this->input->post('zipcode'),
				'register_date' => $this->input->post('register_date'),
				'user_role' => $this->input->post('user_role'),
			);
			
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('users', $data);
			
		}
	}