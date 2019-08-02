<?php
    
class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_users');
        $this->load->helper('url');
    }

    public function index(){

        $data['title'] = 'Users';
        $data['users'] = $this->m_users->getUsers()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('users/index',$data);
        $this->load->view('templates/footer');
    }
}