<?php

class ItemReq extends CI_Controller
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
        $data['body'] = "itemReq/v_list_itemReq";

        $this->load->view('v_home', $data);
    }

    public function add(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "itemReq/v_add_itemReq";

        $this->load->view('v_home', $data);
    }

}
