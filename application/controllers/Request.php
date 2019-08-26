<?php

class Request extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_manufacture');
        $this->load->model('m_warehouse');
        $this->load->model('m_brand');
        $this->load->model('m_request_header');
        $this->load->model('m_request_detail');

        if($this->session->userdata('status') != 'login'){
                redirect('auth');
        }
        
    }


    public function index(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "Request/v_list_request";
        $data['listRequest'] = $this->m_request_header->retrieveRequest();

        // var_dump($data['listRequest']);
        // exit;

        $this->load->view('v_home', $data);
    }
    public function save()
    {
        $request_header = $this->m_request_header;
        $request_detail = $this->m_request_detail;

        $ress_header = $request_header->saveHeader();

        // $config['upload_path'] = base_url().'assets/images/';
        // $config['allowed_types'] = 'jpg|gif|png';

       
        $ress_detail = $request_detail->saveDetail();

        redirect("request");


    }

    public function add(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "Request/v_add_request";
        $data['listCustomer']  = $this->m_customer->retrieveCustomerGet();
        $data['listZone'] = $this->m_customer->retrieveZone();
        $data['listManufacture'] = $this->m_manufacture->retrieveManufactureGet();
        $data['listWarehouse'] = $this->m_warehouse->retrieveWarehouseGet();
        $data['listBrand'] = $this->m_brand->retrieveBrand();


        $this->load->view('v_home', $data);
    }

    public function edit(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "Request/v_edit_request";

        $this->load->view('v_home', $data);
    }

    public function append(){
        $data['listCustomer']  = $this->m_customer->retrieveCustomerGet();
        $data['listZone'] = $this->m_customer->retrieveZone();
        $data['listManufacture'] = $this->m_manufacture->retrieveManufactureGet();
        $data['listWarehouse'] = $this->m_warehouse->retrieveWarehouseGet();
        $data['listBrand'] = $this->m_brand->retrieveBrand();
        $this->load->view('Request/v_append',$data);  
    }

}
