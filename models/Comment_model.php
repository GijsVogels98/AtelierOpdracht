<?php
	class Comment_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function create_comment($post_id) {
			$data = array(
				'post_id' => $post_id,
				'name' => $this->input->post('name'),
				'rating' => $this->input->post('rating'),
				'body' => $this->input->post('body'),
				'created_at' => $this->input->post('created_at')
			);
			
			return $this->db->insert('comments', $data);
		}
		
		public function get_comments($post_id) { 
			 
			 $query = $this->db->get_where('comments', array('post_id' => $post_id ));
			 return $query->result_array();
			 
		}
	}