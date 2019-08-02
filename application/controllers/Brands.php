<?php
class Brands extends CI_controller
{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('m_brands');
        $this->load->helpers('url');
    }

    public function index(){
        $data['title'] = 'Brands Data';
        $data['brands'] = $this->m_brands->getBrands()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('brands/index', $data);
        $this->load->view('templates/footer');
    }

}

?>