<?php
	class Categories extends CI_Controller {
		
		public function index() {
			
			$data['title'] = 'Categories';
			
			$data['categories'] = $this->category_model->get_categories();
			
			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function create() {
			
			$data['title'] = 'Create category';
			
			$this->form_validation->set_rules('category_name', 'Name', 'required', array('required'=>'Het veld naam is verplicht!'));
			
			if ( $this->form_validation->run() === FALSE ) {
				
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
				
			} else {
				
				$this->category_model->create_category();
				
				redirect('categorieen');
				
			}
		}
		
		public function posts($id) {
			
			$data['title'] = $this->category_model->get_category($id)->name;
			
			$data['posts'] = $this->post_model->get_posts_by_category($id);
			
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
						
		}
		
		public function delete($id) {
			
			$this->category_model->delete_category($id);
			
			redirect('categorieen');
			
		}
	}