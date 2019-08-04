<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->model('m_user');
    }

    public function index(){
		$data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "users/v_list_user";

		$getData = $this->m_user->retrieveuser();
		$data['listuser'] = $getData;
		
        $this->load->view('v_home',$data);
    }
}
