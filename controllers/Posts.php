<?php 
	class Posts extends CI_Controller { 
		public function index($offset = 0) {
			
			$config['base_url'] = base_url() . 'posts/index';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 12;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE; 
			$config['attributes'] = array('class' => 'page-link');
			
			$this->pagination->initialize($config);

			$data['title'] = 'Latest news';
			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
			
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function view($slug = NULL) { 
			
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);
			$data['images'] = $this->post_model->get_images($post_id);
			
			if (empty($data['post'])) {
				show_404();
			}
			
			$data['title'] = $data['post']['title'];
			
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function create() {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			if ($this->session->userdata('user_role') == 'Gebruiker') {
				$this->session->set_flashdata('no_rights', 'You do not have permission to do this');
				redirect('/');
			}
			
			$data['title'] = 'Create post';
			
			$data['categories'] = $this->post_model->get_categories();
			
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			
			$this->form_validation->set_rules('userfile', '', 'callback_file_check');
			
			if ($this->form_validation->run()) {
				
				$postId = $this->post_model->create_post();
			
				// Upload Image
				$config['upload_path'] = './assets/images/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '3500000';
				
				$this->load->library('upload');
				
				$this->upload->initialize($config);
					
				$data = array('upload_data' => $this->upload->data());
				$count = count($_FILES['userfile']['name']);
				$files = $_FILES;

				for($i = 0; $i < $count; $i++) {
				   $_FILES['userfile']['name']= $files['userfile']['name'][$i];
				   $_FILES['userfile']['type']= $files['userfile']['type'][$i];
				   $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				   $_FILES['userfile']['error']= $files['userfile']['error'][$i];
				   $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
				   $this->upload->initialize($config);
				   
				   $mimeType = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	   			$filename = md5($_FILES['userfile']['name'] . time()) . '.' . $mimeType;
   
   				if($this->upload->do_upload()) {
	   				
	   				$this->post_model->add_media($_FILES['userfile']['name'], $postId, $filename);
	   				rename('./assets/images/uploads/' . $_FILES['userfile']['name'], './assets/images/uploads/' . $filename);
	   				
   				} else {
					
						$data['error_msg'] = $this->upload->display_errors();
						
					}

				}
					
				$this->session->set_flashdata('post_created', 'Your post has been created.');
					
					redirect('posts');
					
			}	
				
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
				
			
		}
		
		public function delete($id) {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$this->post_model->delete_post($id);
			
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted.');
			
			redirect('posts');
			
		}
		
		public function edit($slug) {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			if ($this->session->userdata('user_role') == 'Gebruiker') {
				$this->session->set_flashdata('no_rights', 'You do not have permission to do this');
				redirect('/');
			}
			
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['images'] = $this->post_model->get_images($post_id);
			
			if ($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id'] ) {
				redirect('/');
			}
			
			
			if (empty($data['post'])) {
				show_404();
			}
			
			$data['title'] = 'Edit post';
			
			$data['categories'] = $this->post_model->get_categories();
			
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function update() {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			if ($this->session->userdata('user_role') == 'Gebruiker') {
				$this->session->set_flashdata('no_rights', 'You do not have permission to do this');
				redirect('/');
			}
			
			$this->post_model->update_post();
			
			if (empty($_FILES['userfile']['name'])) {
				$this->form_validation->set_rules('userfile', 'image', 'required');
			}
			
			$this->form_validation->set_rules('userfile', '', 'callback_file_check');
			
			if ($this->form_validation->run()) {
				
				$postId = $this->post_model->update_post();
			
				// Upload Image
				$config['upload_path'] = './assets/images/uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '3500000';
				
				$this->load->library('upload');
				
				$this->upload->initialize($config);
					
				$data = array('upload_data' => $this->upload->data());
				$count = count($_FILES['userfile']['name']);
				$files = $_FILES;

				for($i = 0; $i < $count; $i++) {
				   $_FILES['userfile']['name']= $files['userfile']['name'][$i];
				   $_FILES['userfile']['type']= $files['userfile']['type'][$i];
				   $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				   $_FILES['userfile']['error']= $files['userfile']['error'][$i];
				   $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
				   $this->upload->initialize($config);
				   
				   $mimeType = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	   			$filename = md5($_FILES['userfile']['name'] . time()) . '.' . $mimeType;
   
   				if($this->upload->do_upload()) {
	   				
	   				$this->post_model->add_media($_FILES['userfile']['name'], $postId, $filename);
	   				rename('./assets/images/uploads/' . $_FILES['userfile']['name'], './assets/images/uploads/' . $filename);
	   				
	   				$this->session->set_flashdata('post_updated', 'Your post has been updated.');
						redirect('posts');
	   				
   				} else {
					
						$data['error_msg'] = $this->upload->display_errors();
						$this->session->set_flashdata('post_update_failed', 'Something went wrong try again.');
						redirect('posts');
					}

				}
					
			}
			redirect('posts');
		}
	
	public function file_check($str){
				
			$count = count($_FILES['userfile']['name']);
			$files = $_FILES;
			
			for($i = 0; $i < $count; $i++) {
				
				$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
				$mime = get_mime_by_extension($files['userfile']['name'][$i]);
				
				if(isset($files['userfile']['name'][$i]) && $files['userfile']['name'][$i]!=""){  
					if(in_array($mime, $allowed_mime_type_arr)){
				
						return true;
				
					} else {
				
						$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
						return false;
				
					}
				
				} else {
				
					$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
					return false;
				
				}   

			}
      }
   }