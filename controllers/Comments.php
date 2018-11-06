<?php
	class Comments extends CI_Controller {
		public function create($post_id) {
			$slug = $this->input->post('slug');
			$data['post'] = $this->post_model->get_posts($slug);
			
			if ($this->form_validation->run()) {
				
				$this->comment_model->create_comment($post_id);
				redirect('posts/'.$slug);
				
			}
			
			redirect('posts/'.$slug);
			
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}
	}