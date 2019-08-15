<?php

class DrawingSpec extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
    }

    public function index(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "drawingSpec/v_list_drawingSpec";

        $this->load->view('v_home', $data);
    }
}
