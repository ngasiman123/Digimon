<?php

class Drawing extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_drawing');
        $this->load->model('m_request_header');
        $this->load->model('m_packaging');
        $this->load->model('m_approve');
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
        $data['listDrawing'] = $this->m_drawing->join_table();

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

        $request_header = $this->m_request_header;
        $data['res'] = $request_header->retrieveRequestHeaderJoin($id);


        $drawing = $this->m_drawing;
        $data['listDetail'] = $drawing->retrieveDrawingDetail($id);
        $approve = $this->m_approve;
        $data['note'] = $approve->note($id);
        $data['no'] =1;

        $this->load->view('v_home', $data);
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
