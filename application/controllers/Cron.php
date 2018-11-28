<?php 
	class Cron extends CI_Controller { 
		public function __construct() {
			parent::__construct();
			$this->load->model('Cron_model');
		}
		
		public function check() { 

			$data['loans'] = $this->Borrowed_model->get_loans();
			$data['categories'] = $this->Category_model->get_categories();
			$data['products'] = $this->Product_model->get_products();
			
			
			$this->load->library('email');
				
			$config = array(
				'mailtype' => 'html',
			);
						
			$this->email->initialize($config);
				
			$this->email->from('noreply@stefverstraten.nl', 'Atelier Sint Lucas');
			$this->email->to('s.verstraten@sintlucasedu.nl');
			
			$this->email->subject('Telaat ingeleverde spullen');
			$this->email->message('teset');
			
			$this->email->send();
			
		}
	}