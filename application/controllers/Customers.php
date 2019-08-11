<?php

class customers extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function index(){
        $data['footer'] = "templates/v_footer";
        $data['sidebar'] = "templates/v_sidebar";
        $data['navbar'] = "templates/v_navbar";
        $data['header'] = "templates/v_header";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "customers/v_list_customer";

        $getData = $this->m_customer->retrieveCustomer();
        $data['listCustomer'] = $getData;
        
        $this->load->view('v_home', $data);
    }
}

?>