<?php 
	class Pages extends CI_Controller { 
		public function view($page = 'home') { 
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}
			
			$data['title'] = ucfirst($page);
			
			$data['loans'] = $this->Borrowed_model->get_loans();
			$data['categories'] = $this->category_model->get_categories();
			$data['products'] = $this->Product_model->get_products();
			
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
			
		}
		
		public function send_mail() { 
         $from_email = "s.verstraten@sintlucasedu.nl"; 
         $to_email = $this->input->post('email'); 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, $this->input->post('name')); 
         $this->email->to($to_email);
         $this->email->subject('Aanvraag producten website'); 
         $this->email->message($this->input->post('name')); 
   
         //Send mail 
         if($this->email->send()) 
         $this->session->set_flashdata("email_sent","Je e-mail is verzonden"); 
         else 
         $this->session->set_flashdata("email_error","Je e-mail is niet verzonden"); 
         
         redirect('aanvragen');
      }
		
	}