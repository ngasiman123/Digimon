<?php

class warehouses extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_warehouse');
    }

    public function index(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "warehouses/v_list_warehouse";

        $getData = $this->m_warehouse->retrieveWarehouse();
        $data['listWarehouse'] = $getData;

        $this->load->view('v_home', $data);
    }
}


?>