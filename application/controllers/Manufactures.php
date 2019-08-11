<?php 
    class manufactures extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('m_manufacture');
        }

        public function index(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "manufactures/v_list_manufacture";
            
            $getData = $this->m_manufacture->retrieveManufacture();
            $data['listManufacture'] = $getData;

            $this->load->view('v_home', $data);
        }
    }
    
?>