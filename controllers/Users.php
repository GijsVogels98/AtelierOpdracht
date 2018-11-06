<?php
	class Users extends CI_Controller {
		
		public function index() {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('/');
			}

			$data['title'] = 'Users';
			$data['users'] = $this->user_model->get_users();
			
			$this->load->view('templates/header');
			$this->load->view('users/index', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function view($slug = NULL) {
			$data['user'] = $this->user_model->get_users($slug);
			
			if(empty($data['user'])) {
				show_404();
			}
			
			$data['title'] = $data['user']['name'];
			
			$this->load->view('templates/header');
			$this->load->view('users/view', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function register() {
			
			if ($this->session->userdata('logged_in')) {
				redirect('/');
			}
			
			 $data['title'] = 'Sign up';
			 
			 $this->form_validation->set_rules('name', 'Name', 'required');
			 $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			 $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			 $this->form_validation->set_rules('password', 'Password', 'required');
			 $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
			 
			if ($this->form_validation->run()) {
				 
				$enc_password = md5($this->input->post('password'));
				 
				$this->user_model->register($enc_password);
				
				$this->session->set_flashdata('user_registered', 'You are now registered and you are able to log in.');
				
				redirect('users/login');
				 
			} 
			 
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function login() {
			
			if ($this->session->userdata('logged_in')) {
				redirect('/');
			}
			
			 $data['title'] = 'Sign In';
			 
			 $this->form_validation->set_rules('username', 'Username', 'required');
			 $this->form_validation->set_rules('password', 'Password', 'required');
			 
			if ($this->form_validation->run()) {
				 
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				
				$user_id = $this->user_model->login($username, $password);
				$user_role = $this->user_model->get_role($username, $password);
				
				if ($user_id) {
					
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true,
						'user_role' => $user_role
					);
					
					$this->session->set_userdata($user_data);
					
					$this->session->set_flashdata('user_loggedin', 'Welcome '. $this->session->userdata('username') .' you are now logged in');
					redirect(base_url());
					
				} else {
				
					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('users/login');
				
				}
				 
			} 
			 
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function logout() {
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_role');
			
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users/login');
		}
		
		public function check_username_exists($username) {
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			
			if ($this->user_model->check_username_exists($username)) {
				return true; 
			} else {
				return false;
			}
		}
		
		public function check_email_exists($email) {
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			
			if ($this->user_model->check_email_exists($email)) {
				return true; 
			} else {
				return false;
			}
		}
		
		public function delete($id) {
			
			if (!$this->session->userdata('user_role') == 'Superadmin') {
				$this->form_validation->set_message('user_delete_error', 'You do not have permission to delete a user');
				redirect('/');
			}
			
			$this->user_model->delete_user($id);
			
			$this->session->set_flashdata('user_deleted', 'The user has been deleted.');
			
			redirect('users');
			
		}
		
		public function edit($slug) {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$data['user'] = $this->user_model->get_users($slug);
			
			if (! $this->session->userdata('user_role') == 'Superadmin' || ! $this->session->userdata('user_id') == $data['user']['id']) {
				redirect('users');
			}
			
			
			if (empty($data['user'])) {
				show_404();
			}
			
			$data['title'] = 'Edit user';
			
			$this->load->view('templates/header');
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer');
			
		}
		
		public function update() {
			
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$this->user_model->update_user();
			
			$this->session->set_flashdata('post_updated', 'Your user has been updated.');
			
			redirect('users');
			
		}
	}