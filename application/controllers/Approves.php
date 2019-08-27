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

        $approve = $this->m_approve;
        $data['ressApprove'] = $approve->retrieveCekApprove($request_header_id);
        $data['no']=1;

        $this->load->view('v_home', $data);
    }
    public function cek(){

        $request = $this->m_approve;
        $ress = $request->cekApprove();

        if ($this->input->post('cek')==3){
            $this->session->set_flashdata("msg", "<div class='alert alert-success' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Data has been Approved.
            </div>");
            redirect("approves");
        }else if($this->input->post('cek')==2){
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been Revised. 
            </div>");
            redirect("approves");
        }else if($this->input->post('cek')==0){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been Rejected. 
            </div>");
            redirect("approves");
        }

    }
}
