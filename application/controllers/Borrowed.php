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
   	
   	public function deredeem($id) {
         $this->Borrowed_model->redeem_loan($id);
         $this->session->set_flashdata('redeem_product', 'De lening is toegevoegd aan de openstaande leningen lijst');
         redirect('lenen/ingeleverd');
   	}
   	
   	public function create() {
			$data['title'] = 'Nieuwe lening';
			
			$data['products'] = $this->Product_model->get_products();
			
			$this->form_validation->set_rules('customer_name', 'Naam', 'required', array('required'=>'Het veld naam is verplicht!'));
			$this->form_validation->set_rules('customer_email', 'Email', 'required', array('required'=>'Het e-mailadres is een verplicht veld!'));
			$this->form_validation->set_rules('borrowed_till', 'Naam', 'required', array('required'=>'De inleverdatum is een verplicht veld!'));
			
			if ($this->form_validation->run()) {
				$this->Borrowed_model->create_loan();
				$this->session->set_flashdata('product_created', 'Je product is toegevoegd!');
				redirect('lenen');
			}
			
			$this->load->view('templates/header');
			$this->load->view('borrowed/create', $data);
			$this->load->view('templates/footer');
		}
	}