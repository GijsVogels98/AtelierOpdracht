<?php
	class Borrowed_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_loans($slug = FALSE) {
			if ($slug === FALSE) {
				$query = $this->db->get('borrowed');
				return $query->result_array();
			}
			$query = $this->db->get_where('borrowed', array('slug' => $slug));
			return $query->row_array();
		}