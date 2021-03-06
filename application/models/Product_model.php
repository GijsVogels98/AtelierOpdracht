<?php
	class Product_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}
		
		public function get_products($slug = FALSE) {
			if ($slug === FALSE) {
				$this->db->join('categories', 'categories.id = products.category_id');
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
				'category_id' => $this->input->post('category_id'),
			);
			
			$this->db->insert('products', $data);
			
			return;
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
      
      public function get_products_by_category($category_id) {
			
			$this->db->order_by('products.product_id', 'DESC');
			$this->db->join('categories', 'categories.id = products.category_id');
			$query = $this->db->get_where('products', array('category_id' => $category_id));
			return $query->result_array();
			
		}

		public function update_post(){
         $slug = url_title($this->input->post('name'));

         $data = array(
             'name' => $this->input->post('name'),
             'slug' => $slug,
             'body' => $this->input->post('body'),
             'count' => $this->input->post('count'),
             'category_id' => $this->input->post('category_id'),
         );
         $this->db->where('product_id', $this->input->post('id'));
         return $this->db->update('products', $data);
     	}
		
		public function product_plus_one() {
			
			$this->db->where('product_id', $this->input->post('product_id'));
			$this->db->set('product_lent', 'product_lent+1', FALSE);
			$this->db->update('products');
			
			return true;
		}
		
		public function product_min_one() {
			
			$this->db->where('product_id', $this->input->post('product_id'));
			$this->db->set('product_lent', 'product_lent-1', FALSE);
			$this->db->update('products');
			
			return true;
		}
	}