<?php

class Receive extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_request_header');
        $this->load->model('m_request_detail');
        $this->load->model('m_receive');


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
        $data['body'] = "receive/v_list_receive";

        $data['listRequest'] = $this->m_request_header->retrieveReceive();

        $this->load->view('v_home', $data);
    }

    public function detail(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "receive/v_detail_receive";
        $data['no'] =1;
        $id = $this->uri->segment(3);
        $data['res'] = $this->m_request_header->retrieveRequestHeaderJoin($id);
        $data['listDetail'] = $this->m_receive->retrieveReceiveId($id);


        $this->load->view('v_home', $data);
    }

    public function confirm()
    {
        $receive = $this->m_receive;
        $res = $receive->confirm();
        exit;

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
