<?php
    class users extends CI_Controller{
        public function register(){
            $data['title'] = 'Registreer';

            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
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

        //check if username exists
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','Naam al in gebruik.');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
        //check if email exists
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','Email al in gebruik.');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }
        }


    }