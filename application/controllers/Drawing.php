<?php

class Drawing extends CI_Controller
{
    public function __construct(){
        parent::__construct();
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

        $this->load->view('v_home', $data);
    }

    public function detail(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "drawing/v_detail_drawing";

        $this->load->view('v_home', $data);
    }
}
