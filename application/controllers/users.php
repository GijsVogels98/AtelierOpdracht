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

                redirect('login');
            }
        }
        //login user
        public function login(){
            $data['title'] = 'Inloggen';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Wachtwoord','required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else{
                //get username
                $username = $this->input->post('username');
                //get and enc password
                $password = sha1($this->input->post('password'));

                //login user
                $user_id = $this->user_model->login($username,$password);

                if($user_id){
                    //create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    //set messages
                    $this->session->set_flashdata('user_loggedin','U bent ingelogd.');

                    redirect('/');
                }else{
                    //set messages
                    $this->session->set_flashdata('login_failed','Wachtwoord en gebruikersnaam komen niet overeen.');

                    redirect('login');
                }
            }
        }
        //log user out
        public function logout(){
            //unset userdata
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('user_loggedout','U bent uitgelogd');
            redirect('login');
        }

        //check if username exists
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','Naam al in gebruik.');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
        //check if email exists
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','Email al in gebruik.');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }
        }


    }