<?php

class Manufactures extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('m_manufactures');
        $this->load->helpers('url');
    }

    public function index(){
        $data['title'] = 'Manufactures Data';
        $data['manufactures'] = $this->m_manufactures->getManufactures()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('manufacture/index',$data);
        $this->load->view('templates/footer');
    }
}