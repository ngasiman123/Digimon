<?php

class Packaging extends CI_Controller
{
    public function __construct(){
        parent::__construct();

        $this->load->model('M_request_header');
        $this->load->model('M_packaging');
        $this->load->model('M_request_detail');
        $this->load->model('M_drawing');


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
        $data['body'] = "packaging/v_list_packaging";
        // $data['listRequest'] = $this->m_packaging->retrievePackagingJoin();
        $data['listPackaging'] = $this->M_packaging->join_table();
        
        $this->load->view('v_home', $data);
    }

    public function detail(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "packaging/v_detail_packaging";

        $id = $this->uri->segment(3);
        $packaging = $this->M_packaging;
        $data['drawing_spec_id'] =$id;
        $data['res'] = $packaging->packagingDetail($id);
        // var_dump($data['res']);
        // exit;
        // $request_header = $this->m_request_header;
        // $data['res'] = $request_header->retrieveRequestHeaderJoin($id);

        // $packaging = $this->m_packaging;
        // $data['listDetail'] = $packaging->retrievePackagingDetail($id);
        $this->load->view('v_home', $data);
    }
    public function save(){

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '0';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('pack_img');
        $image_data = $this->upload->data();


        if ($this->input->post('status')==1) {

            $packaging = $this->M_packaging;
            $result = $packaging->save();
            $drawing = $this->M_drawing;
            $res = $drawing->updateStatus();
            
        }else{

            $drawing = $this->M_drawing;
            $res = $drawing->updateStatus();
        }

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect('Packaging');
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect('Packaging');
        }

    }
    public function updaterow(){


        $inner_box = $_FILES['inner_box']['name'];
        $tmp = $_FILES['inner_box']['tmp_name'];
        $type = $_FILES['inner_box']['type'];
        $error = $_FILES['inner_box']['error'];
        $size = $_FILES['inner_box']['size'];

        $outter_box = $_FILES['outter_box']['name'];
        $tmp_outter = $_FILES['outter_box']['tmp_name'];
        $type_outter = $_FILES['outter_box']['type'];
        $error_outter = $_FILES['outter_box']['error'];
        $size_outter = $_FILES['outter_box']['size'];

        move_uploaded_file($tmp, 'uploads/'.str_replace(" ","_",$inner_box));
        move_uploaded_file($tmp_outter, 'uploads/'.str_replace(" ","_",$outter_box));


        $packaging = $this->m_packaging;
        $res = $packaging->updaterow();

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
