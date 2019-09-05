<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_request_header');
        $this->load->model('M_approve');
        $this->load->model('M_drawing');
        $this->load->model('M_packaging');
        
        if($this->session->userdata('status') != 'login'){
                redirect('auth');
        }

    }

    public function index(){
    
		$data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "dashboard/v_dashboard";

        $data['itemRequest'] = $this->M_request_header->retrieveRequest();
        $data['itemApprove'] = $this->M_approve->join_table();
        $data['itemDrawing'] = $this->M_drawing->join_table();
        $data['itemPackaging'] = $this->M_packaging->join_table();


        $this->load->view('v_home',$data);


    }
}
