<?php
	class Borrowed_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_loans($slug = FALSE) {
			if ($slug === FALSE) {
				$this->db->join('products', 'products.product_id = borrowed.product_id');
				$query = $this->db->get('borrowed');
				return $query->result_array();
			}
			$query = $this->db->get_where('borrowed', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function redeem_loan($id){
		   
		   $data = array(
            'returned' => $this->input->post('returned'),
         );
         
         $this->db->where('id', $id);
         $this->db->update('borrowed', $data);
         return true;
      }
	}