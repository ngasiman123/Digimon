<?php

class Customers extends CI_controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customers');
        $this->load->helpers('url');
    }

    public function index(){
        $data['title'] = 'Customers Data';
        $data['customers'] = $this->m_customers->getCustomers()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('customers/index',$data);
        $this->load->view('templates/footer');
    }

}


?>