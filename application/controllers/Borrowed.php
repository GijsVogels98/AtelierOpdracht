<?php
	class Borrowed extends CI_Controller { 
		public function index() {
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$data['page'] = 'lenen';
			
			$data['title'] = 'Openstaande leningen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function redeemed() { 
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$data['page'] = 'lenen';
			
			$data['title'] = 'Afgeronde leningen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/redeemed', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function denied_requests() { 
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$data['page'] = 'geweigerd';
			
			$data['title'] = 'Afgewezen aanvragen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/denied', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function accepted_requests() { 
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			$data['page'] = 'geaccepteerd';
			
			$data['title'] = 'Geaccepteerde aanvragen';
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/accepted', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function redeem($id) {
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
         $this->Borrowed_model->redeem_loan($id);
         $this->Product_model->product_min_one();
         $this->session->set_flashdata('redeem_product', 'Je lening is afgelost.');
         redirect('lenen');
   	}
   	
   	public function deredeem($id) {
	   	
	   	if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
	   	
         $this->Borrowed_model->redeem_loan($id);
         $this->Product_model->product_plus_one();
         $this->session->set_flashdata('redeem_product', 'De lening is toegevoegd aan de openstaande leningen lijst');
         redirect('lenen/ingeleverd');
   	}
   	
   	public function create() {
	   	
	   	if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
			$data['page'] = 'lenen';
	   	
			$data['title'] = 'Nieuwe lening';
			
			$data['products'] = $this->Product_model->get_products();
			
			$this->form_validation->set_rules('customer_name', 'Naam', 'required', array('required'=>'Het veld naam is verplicht!'));
			$this->form_validation->set_rules('customer_email', 'Email', 'required', array('required'=>'Het e-mailadres is een verplicht veld!'));
			$this->form_validation->set_rules('borrowed_till', 'Naam', 'required', array('required'=>'De inleverdatum is een verplicht veld!'));
			
			if ($this->form_validation->run()) {
				$this->Borrowed_model->create_loan();
				$this->Product_model->product_plus_one();
				$this->session->set_flashdata('product_created', 'Je lening is toegevoegd!');
				redirect('lenen');
			}
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/create', $data);
			$this->load->view('templates/footer');
		}
		
		
		public function request() {
			$data['page'] = 'aanvragen';
			
			$data['title'] = 'Nieuwe lening aanvragen';
			
			$data['products'] = $this->Product_model->get_products();
			
			$this->form_validation->set_rules('customer_name', 'Naam', 'required', array('required'=>'Het veld naam is verplicht!'));
			$this->form_validation->set_rules('customer_email', 'Email', 'required', array('required'=>'Het e-mailadres is een verplicht veld!'));
			$this->form_validation->set_rules('borrowed_at', 'Naam', 'required', array('required'=>'De leendatum is een verplicht veld!'));
			$this->form_validation->set_rules('borrowed_till', 'Naam', 'required', array('required'=>'De inleverdatum is een verplicht veld!'));
			
			if ($this->form_validation->run()) {
				$this->Borrowed_model->request_loan();
				$this->session->set_flashdata('product_created', 'Je lening is aangevraagd!');
				
				$this->load->library('email');
				
				$config = array(
					'mailtype' => 'html',
				);
				
				$this->email->initialize($config);
				
				$this->email->from('noreply@stefverstraten.nl', 'Atelier Sintlucas');
				$this->email->to('s.verstraten@sintlucasedu.nl');
				
				$this->email->subject('Aanvraag atelier');
				$this->email->message($this->Borrowed_model->request_mail());
				
				$this->email->send();
				
				
				redirect('/');
			}
			
			$this->load->view('templates/header', $data);
			$this->load->view('borrowed/request', $data);
			$this->load->view('templates/footer');
		}
		
		public function request_answer($id) {
			
			if (isset($_POST['accept'])) {
				if (!$this->session->userdata('logged_in')) {
					$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
					redirect('login');
				}
			
	         $this->Borrowed_model->accept_request($id);
	         //$this->Product_model->product_min_one();
	         $this->session->set_flashdata('redeem_product', 'De lening is geaccepteerd');
	         
	         $this->load->library('email');
				
				$config = array(
					'mailtype' => 'html',
				);
				
				$this->email->initialize($config);
				
				$this->email->from('noreply@stefverstraten.nl', 'Atelier Sintlucas');
				$this->email->to($this->input->post('customer_email'));
				
				$this->email->subject('Je aanvraag is geaccepteerd!');
				$this->email->message($this->Borrowed_model->accept_request($id));
				
				$this->email->send();
	         
	         redirect('/');	
			} elseif (isset($_POST['denied'])) {
				if (!$this->session->userdata('logged_in')) {
					$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
					redirect('login');
				}
	   	
	         $this->Borrowed_model->denied_request($id);
	         //$this->Product_model->product_plus_one();
	         $this->session->set_flashdata('redeem_product', 'De lening is geweigerd');
	         
	         $this->load->library('email');
				
				$config = array(
					'mailtype' => 'html',
				);
				
				$this->email->initialize($config);
				
				$this->email->from('noreply@stefverstraten.nl', 'Atelier Sintlucas');
				$this->email->to($this->input->post('customer_email'));
				
				$this->email->subject('Je aanvraag is geweigerd!');
				$this->email->message($this->Borrowed_model->denied_request($id));
				
				$this->email->send();
	         
	         redirect('/');
			}
			
		}
		
   	
   	public function delete($id) {
			
			if (!$this->session->userdata('logged_in')) {
				$this->session->set_flashdata('no_rights', 'Je hebt geen rechten tot deze pagina');
				redirect('login');
			}
			
         $this->Borrowed_model->delete_loan($id);
         $this->session->set_flashdata('product_deleted', 'De lening is verwijderd.');
         redirect('lenen/ingeleverd');
   	}
   	
      
      public function get_autocomplete(){
         if (isset($_GET['term'])) {
             $result = $this->Autoload_model->search_autoload($_GET['term']);
             if (count($result) > 0) {
                 foreach ($result as $row)
                     $arr_result[] = array(
                         'label'         => $row->stamnr,
                         'name'   => $row->roepnaam . ' ' . $row->tussenv . ' ' . $row->achternaam,
                         'email'   => $row->e_mail,
                     );
                 echo json_encode($arr_result);
             }
         }
      }
	}
