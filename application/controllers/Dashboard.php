<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    
    }

    public function index(){
    
		$data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "dashboard/v_dashboard";
        $this->load->view('v_home',$data);
    }
}
