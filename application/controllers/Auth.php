<?php

class Auth extends CI_controller
{
    public function __construct(){
        parent::__construct();
    }

    function index(){
        $data['title'] = 'Login';
        
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    function login(){
        $user = $this->input->post('user');
        $pass = $this->input->post('password');
        $users = $this->db->get_where('users', ['user_name' => $user])->row_array();
        if ($users) {
            if($users['password'] === $pass){
            $data = [
                'user_name' => $users['user_name'],
                'name' => $users['name'],
                'zone_code' => $users['zone_code'],
                'role_id' => $users['role_id']
            ];
            $this->session->set_userdata($data);
            redirect('Dashboard');
            }else{
                redirect('Auth');    
            }
        }else{
            redirect('Auth');
        }
    }
}


?>