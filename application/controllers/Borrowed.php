<?php
	class Borrowed extends CI_Controller { 
		public function index() { 
			
			$data['title'] = 'Lenen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header');
			$this->load->view('borrowed/index', $data);
			$this->load->view('templates/footer');
			
		}
	}