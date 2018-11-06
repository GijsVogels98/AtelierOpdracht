<?php 
	class Products extends CI_Controller { 
		public function index() { 
			
			$data['title'] = 'Producten';
			
			$data['products'] = $this->Product_model->get_products();
			
			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
			
		}
	}