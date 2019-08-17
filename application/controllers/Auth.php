<?php

class Auth extends CI_controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_auth');
    }

    function index(){
        $data['title'] = 'Login';
        $this->load->view('auth/login');
        
    }

    public function login(){
        $user = $this->input->post('user_name');
        $pass = $this->input->post('password');
        
        $queryUser = $this->m_auth->userLogin($user, $pass);

        if($queryUser){
            $data = ['user'=> $queryUser["user_name"]];
            $this->session->set_userdata($data);
            redirect('dashboard');
        }else{
            $this->session->set_flashdata("msg","<div class='alert alert-danger' role='alert'>
            <a class='close' href='#'  data-dismiss='alert' aria-label='close'>&times;</a>
            <b>Failed login !</b><br> Your user & password is wrong, please check
            </div>");
            redirect('auth');
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('auth');
    }

}

?>