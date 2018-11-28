<?php
	class Categories extends CI_Controller {
		
		public function index() {
			
			$data['page'] = 'categorieen';
			
			$data['title'] = 'Categorieën';
			
			$data['categories'] = $this->Category_model->get_categories();
			
			$this->load->view('templates/header', $data);
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function create() {
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$data['page'] = 'nieuw';
			
			$data['title'] = 'Nieuw categorie';
			
			$this->form_validation->set_rules('category_name', 'Name', 'required', array('required'=>'Het veld naam is verplicht!'));
			
			if ( $this->form_validation->run() === FALSE ) {
				
				$this->load->view('templates/header', $data);
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
				
			} else {
				
				$this->Category_model->create_category();
				
				$this->session->set_flashdata('category_created', 'Je categorie is toegevoegd');
				
				redirect('categorieen');
				
			}
		}
		
		public function posts($id) {
			
			$data['title'] = $this->Category_model->get_category($id)->category_name;
			
			$data['products'] = $this->Product_model->get_products_by_category($id);
			
			$this->load->view('templates/header', $data);
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
						
		}
		
		public function delete($id) {
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$this->Category_model->delete_category($id);
			
			$this->session->set_flashdata('category_deleted', 'Je categorie is verwijderd');
			
			redirect('categorieen');
			
		}
	}