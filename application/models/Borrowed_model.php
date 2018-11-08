<?php
	class Borrowed_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_loans($slug = FALSE) {
			if ($slug === FALSE) {
				$this->db->order_by('borrowed.borrowed_till', 'ASC');
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
      
      public function create_loan() {
			
			$data = array(
				'customer_name' => $this->input->post('customer_name'),
				'customer_email' => $this->input->post('customer_email'),
				'borrowed_till' => $this->input->post('borrowed_till'),
				'product_id' => $this->input->post('product_id'),
			);
			
			return $this->db->insert('borrowed', $data);;
		}
	}