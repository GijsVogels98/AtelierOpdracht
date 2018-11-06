<?php 
	class Post_model extends CI_Model { 
		public function __construct(){
			$this->load->database(); 
		}
		
		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE) { 
			if ($limit) {
				$this->db->limit($limit, $offset);
			}
			
			if ($slug === FALSE) { 
				$this->db->order_by('posts.id', 'DESC');
				$this->db->join('categories', 'categories.id = posts.category_id');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			
			$query = $this->db->get_where('posts', array('slug' => $slug));


			return $query->row_array();
		}
		
		public function create_post() {
			
			$slug = url_title($this->input->post('title'));
			
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'created_at' => $this->input->post('created_at'),
				'category_id' => $this->input->post('category_id'),
				'user_id' => (int) $this->session->userdata('user_id'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'streetname' => $this->input->post('streetname'),
				'house_number' => $this->input->post('house_number'),
				'zipcode' => $this->input->post('zipcode'),
				'town' => $this->input->post('town'),
				'monday_start' => $this->input->post('monday_start'),
				'monday_end' => $this->input->post('monday_end'),
				'tuesday_start' => $this->input->post('tuesday_start'),
				'tuesday_end' => $this->input->post('tuesday_end'),
				'wednesday_start' => $this->input->post('wednesday_start'),
				'wednesday_end' => $this->input->post('wednesday_end'),
				'thursday_start' => $this->input->post('thursday_start'),
				'thursday_end' => $this->input->post('thursday_end'),
				'friday_start' => $this->input->post('friday_start'),
				'friday_end' => $this->input->post('friday_end'),
				'saturday_start' => $this->input->post('saturday_start'),
				'saturday_end' => $this->input->post('saturday_end'),
				'sunday_start' => $this->input->post('sunday_start'),
				'sunday_end' => $this->input->post('sunday_end'),
			);
				$this->db->insert('posts', $data);
				
			 return $this->db->insert_id();
			
		}
		
		public function delete_post($id) {
			
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
			
		}
		
		public function update_post() {
			
			$slug = url_title($this->input->post('title'));
			
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'phone_number' => $this->input->post('phone_number'),
				'email' => $this->input->post('email'),
				'streetname' => $this->input->post('streetname'),
				'house_number' => $this->input->post('house_number'),
				'zipcode' => $this->input->post('zipcode'),
				'town' => $this->input->post('town'),
				'monday_start' => $this->input->post('monday_start'),
				'monday_end' => $this->input->post('monday_end'),
				'tuesday_start' => $this->input->post('tuesday_start'),
				'tuesday_end' => $this->input->post('tuesday_end'),
				'wednesday_start' => $this->input->post('wednesday_start'),
				'wednesday_end' => $this->input->post('wednesday_end'),
				'thursday_start' => $this->input->post('thursday_start'),
				'thursday_end' => $this->input->post('thursday_end'),
				'friday_start' => $this->input->post('friday_start'),
				'friday_end' => $this->input->post('friday_end'),
				'saturday_start' => $this->input->post('saturday_start'),
				'saturday_end' => $this->input->post('saturday_end'),
				'sunday_start' => $this->input->post('sunday_start'),
				'sunday_end' => $this->input->post('sunday_end'),
			);
			
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('posts', $data);	
			return $this->input->post('id');

		}		
		
		
		public function add_media($post_image, $postId = null, $filename) {
			
			$data = array(
				
				'path' 		=> $filename,
				'user_id' 	=> $this->session->userdata('user_id'),
				'post_id' 	=> $postId
			);
			
			return $this->db->insert('media', $data);
			
		}
		
		
		public function get_categories() {
			
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			
			return $query->result_array();
			
		}
		
		public function get_posts_by_category($category_id) {
			
			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get_where('posts', array('category_id' => $category_id));
			return $query->result_array();
			
		}
		
		public function get_images($post_id) { 
			 
			 $query = $this->db->get_where('media', array('post_id' => $post_id ));
			 return $query->result_array();
			 
		}
	}