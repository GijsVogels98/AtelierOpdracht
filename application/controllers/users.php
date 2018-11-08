<?php
    class users extends CI_Controller{
        public function register(){
            $data['title'] = 'Registreer';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('email2','Herhaal Email','matches[email]');
            $this->form_validation->set_rules('password','Wachtwoord','required');
            $this->form_validation->set_rules('password2','Herhaal Wachtwoord','matches[password]');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else{
                //ecnrypt password
                $enc_password = sha1($this->input->post('password'));

                $this->user_model->register($enc_password);

                //set messages
                $this->session->set_flashdata('user_registered','Gebruiker Geregistreerd');

                redirect('producten');
            }
        }
    }