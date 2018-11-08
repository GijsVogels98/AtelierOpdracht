<?php
	class Borrowed extends CI_Controller { 
		public function index() { 
			
			$data['title'] = 'Openstaande leningen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header');
			$this->load->view('borrowed/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function redeemed() { 
			
			$data['title'] = 'Afgeronde leningen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header');
			$this->load->view('borrowed/redeemed', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function redeem($id) {
         $this->Borrowed_model->redeem_loan($id);
         $this->session->set_flashdata('redeem_product', 'Het product is ingeleverd.');
         redirect('lenen');
   	}
	}