<?php

class Bom extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_request_header');
        $this->load->model('M_request_detail');
        $this->load->model('M_packaging');
        $this->load->model('M_bom');


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
        $data['listBom'] = $this->M_bom->join_table();

        // $data['listRequest'] = $this->m_request_header->retrieveRequestBOM();

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
        $id = $this->uri->segment(3);
        $bom = $this->M_bom;
        $data['bom_id'] = $id;
        $data['res'] = $this->M_bom->bomDetail($id);

        // $data['res'] = $this->m_request_header->retrieveBOMid($id);
        // $data['listDetail'] = $this->m_bom->retrieveBOMid($id);

        $this->load->view('v_home', $data);
    }

    public function save()
    {
        if ($this->input->post('status')==1) {

            $bom = $this->M_bom;
            $result = $bom->save();

            $packaging = $this->M_packaging;
            $res = $packaging->updateStatus();
            echo "1";
            
        }else{

            $packaging = $this->M_packaging;
            $res = $packaging->updateStatus();
        }

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect('BOM');
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect('BOM');
        }
    }

    public function updaterow(){

        $movex_filter = $_FILES['movex_filter']['name'];
        $tmp = $_FILES['movex_filter']['tmp_name'];
        $type = $_FILES['movex_filter']['type'];
        $error = $_FILES['movex_filter']['error'];
        $size = $_FILES['movex_filter']['size'];

        $sap_filter = $_FILES['sap_filter']['name'];
        $tmp_filter = $_FILES['sap_filter']['tmp_name'];
        $type_filter = $_FILES['sap_filter']['type'];
        $error_filter = $_FILES['sap_filter']['error'];
        $size_filter = $_FILES['sap_filter']['size'];

        move_uploaded_file($tmp, 'uploads/'.str_replace(" ","_",$movex_filter));
        move_uploaded_file($tmp_filter, 'uploads/'.str_replace(" ","_",$sap_filter));

        $bom = $this->m_bom;
        $res = $bom->updaterow();

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
