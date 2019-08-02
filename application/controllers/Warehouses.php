<?php

class Warehouses extends CI_controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_warehouses');
        $this->load->helpers('url');
    }

    public function index(){
        $data['title'] = 'Warehouse Data';
        $data['warehouses'] = $this->m_warehouses->getWarehouses()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('warehouses/index', $data);
        $this->load->view('templates/footer');
    }
}


?>