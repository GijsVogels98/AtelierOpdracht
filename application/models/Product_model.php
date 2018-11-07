<?php
	class Product_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_products($slug = FALSE) {
			if ($slug === FALSE) {
				$query = $this->db->get('products');
				return $query->result_array();
			}
			$query = $this->db->get_where('products', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function create_product() {
			$slug = url_title($this->input->post('name'));
			
			$data = array(
				'name' => $this->input->post('name'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'count' => $this->input->post('count'),
				'available' => $this->input->post('count'),
				'category_id' => $this->input->post('category_id'),
			);
			
			$this->db->insert('products', $data);
			
			return $slug;
		}
		
		public function delete_product($id){
		   $this->db->where('product_id', $id);
		   $this->db->delete('products');
		   return true;
      }
      
      public function get_categories() {
	      $this->db->order_by('id');
	      $query = $this->db->get('categories');
	      return $query->result_array();
      }
	}