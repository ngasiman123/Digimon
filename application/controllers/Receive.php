<?php

class Receive extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_request_header');
        $this->load->model('M_request_detail');
        $this->load->model('M_bom');
        $this->load->model('M_receive');


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

        $data['listReceive'] = $this->M_receive->join_table();

        // $data['listRequest'] = $this->m_request_header->retrieveReceive();

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
        $receive = $this->M_receive;
        $data['bom_id'] = $id;
        $data['res'] = $receive->receiveDetail($id);
        // $data['res'] = $this->m_request_header->retrieveRequestHeaderJoin($id);
        // $data['listDetail'] = $this->m_receive->retrieveReceiveId($id);


        $this->load->view('v_home', $data);
    }

    public function confirm(){        
        $receive = $this->M_receive;
        $res = $receive->confirm();
        $result = $this->M_bom->updateStatus();

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect('Receive');
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect('Receive');
        }
    }

    // public function confirm()
    // {
    //     $receive = $this->m_receive;
    //     $res = $receive->confirm();
    //     exit;

    //     if ($res){
    //         $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
    //         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    //         <strong>Warning!</strong> Failed saved.
    //         </div>");
    //         redirect($_SERVER['HTTP_REFERER']);
    //     }else{
    //         $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
    //         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    //         <strong>Information!</strong> Data has been saved. 
    //         </div>");
    //         redirect($_SERVER['HTTP_REFERER']);
    //     }
    // }
}
