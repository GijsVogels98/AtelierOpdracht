<?php 
	class Products extends CI_Controller { 
		public function index() { 
			
			$data['title'] = 'Producten';
			
			$data['products'] = $this->Product_model->get_products();
			
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function view($slug = NULL) {
			$data['product'] = $this->Product_model->get_products($slug);
			
			if (empty($data['product'])) {
				show_404();
			}
			
			$data['title'] = $data['product']['name'];
			
			$this->load->view('templates/header');
			$this->load->view('products/view', $data);
			$this->load->view('templates/footer');
		}
		
		public function create() {
			$data['title'] = 'Nieuw product';
			
			$this->form_validation->set_rules('name', 'Naam', 'required', array('required'=>'Het veld naam is verplicht!'));
			$this->form_validation->set_rules('body', 'Aantal', 'required|alpha_numeric', array('required'=>'Het veld aantal is verplicht!'));
			
			if ($this->form_validation->run()) {
				redirect('/producten/' . $this->Product_model->create_product());
			}
			
			$this->load->view('templates/header');
			$this->load->view('products/create', $data);
			$this->load->view('templates/footer');
		}
	}