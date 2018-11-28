<?php 
	class Pages extends CI_Controller { 
		public function view($page = 'home') { 
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}
			
			$data['page'] = $page;
			
			$data['title'] = ucfirst($page);
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			$data['categories'] = $this->Category_model->get_categories();
			$data['products'] = $this->Product_model->get_products();
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
			
		}
	}