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
            $arrayAccessAdminSales = [
                'Masters'=>
                [
                    'Customers','Zones'
                ],
                'Transaction'=>
                [
                    'Item Request','Receive Master'
                ],
            ];
            
            if ($queryUser['access_level'] == 1) {
                $data = [
                    'user'=> $queryUser["user_name"],
                    'access' => $arrayAccessAdminSales
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            }

            
        }else{
            $this->session->set_flashdata("msg","<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Login Failed!</strong><br> Check your username & password. 
            </div>");
            redirect('auth');
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('access');
        redirect('auth');
    }

}

?>