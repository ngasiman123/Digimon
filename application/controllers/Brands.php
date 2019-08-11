<?php 
    class brands extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('m_brand');
        }

        public function index(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "brands/v_list_brand";
            
            $getData = $this->m_brand->retrieveBrand();
            $data['listBrand'] = $getData;

            $this->load->view('v_home', $data);
        }
    }
    
?>