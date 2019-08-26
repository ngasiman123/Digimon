<?php

class Approves extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_approve');
        $this->load->model('m_request_header');
        $this->load->model('m_request_detail');
        
    }

    public function index(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "approves/v_list_approve";
        $data['listApprove'] = $this->m_approve->join_table();
        $this->load->view('v_home', $data);
    }

    public function detail(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "approves/v_detail_approve";

        $request_header_id = $this->uri->segment(3);
        $request_header = $this->m_request_header;
        $data['ress'] = $request_header->retrieveRequestHeaderJoin($request_header_id);
        $data['lisRequestDetail'] = $this->m_request_detail->retrieveRequestDetailId($request_header_id);
        $data['no']=1;
        $this->load->view('v_home', $data);
    }
}
