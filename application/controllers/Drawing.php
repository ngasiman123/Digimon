<?php

class Drawing extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_drawing');
        $this->load->model('M_request_header');
        $this->load->model('M_request_detail');
        $this->load->model('M_packaging');
        $this->load->model('M_approve');
        $this->load->helper(array('form', 'url', 'file'));

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
        $data['body'] = "drawing/v_list_drawing";
        $data['listDrawing'] = $this->M_drawing->join_table();

        $this->load->view('v_home', $data);
    }

    public function detail(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "drawing/v_detail_drawing";

        $id = $this->uri->segment(3);
        $data['request_id'] = $id;
        $req_detail = $this->M_drawing;
        $data['res'] = $req_detail->drawingDetail($id);

        $this->load->view('v_home', $data);
    }
    public function save()
    {   
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '0';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('drawing_img');
        $image_data = $this->upload->data();

        if ($this->input->post('status')==1) {
            $drawing = $this->M_drawing;
            $res = $drawing->save();
            $detail = $this->M_request_detail;
            $res = $detail->updateRequest();
        }else{
            $detail = $this->M_request_detail;
            $res = $detail->updateRequest();
        }

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect('Drawing');
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect('Drawing');
        }
    }
    public function updaterow()
    {   
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = '0';

        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->upload->do_upload('drawing_img');
        $image_data = $this->upload->data();
        // $file_path = $image_data[full_path];


        $drawing = $this->m_drawing;
        $res = $drawing->updaterow();


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
