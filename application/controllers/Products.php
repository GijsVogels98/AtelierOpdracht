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
			
			$data['categories'] = $this->Product_model->get_categories();
			
			$this->form_validation->set_rules('name', 'Naam', 'required', array('required'=>'Het veld naam is verplicht!'));
			$this->form_validation->set_rules('count', 'Aantal', 'required', array('required'=>'Het veld aantal is verplicht!'));
			
			if ($this->form_validation->run()) {
				$this->session->set_flashdata('product_created', 'Je product is toegevoegd!');
				redirect('/producten/' . $this->Product_model->create_product());
			}
			
			$this->load->view('templates/header');
			$this->load->view('products/create', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id) {
         $this->Product_model->delete_product($id);
         $this->session->set_flashdata('product_deleted', 'Het product is verwijderd.');
         redirect('producten');
   	}
   	
		public function edit($slug) {
         $data['product'] = $this->Product_model->get_products($slug);
         $data['categories'] = $this->Product_model->get_categories();

         if (empty($data['product'])) {
             show_404();
         }

         $data['title'] = 'Edit Product';

         $this->load->view('templates/header');
         $this->load->view('products/edit', $data);
         $this->load->view('templates/footer');
      }

      public function update(){
		    $this->Product_model->update_post();

            $this->session->set_flashdata('product_updated','Het product is bewerkt.');

		    redirect('producten');
      }

	}