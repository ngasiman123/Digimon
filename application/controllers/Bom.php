<?php

class Bom extends CI_Controller
{
    public function __construct(){
        parent::__construct();

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
        $data['body'] = "bom/v_list_bom";
        // $data['listRequest'] = $this->m_request_header->retrieveRequestPackaging();

        $this->load->view('v_home', $data);
    }

    public function detail(){
        
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "bom/v_detail_bom";
        $data['no']=1;
        // $id = $this->uri->segment(3);
        // $data['res'] = $this->m_request_header->retrieveRequestId($id);
        // $data['listDetail'] = $this->m_request_detail->retrieveRequestDetailId($id);

        $this->load->view('v_home', $data);
    }

}
