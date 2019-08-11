<?php

class customers extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function index(){
        $data['footer'] = "templates/v_footer";
        $data['sidebar'] = "templates/v_sidebar";
        $data['navbar'] = "templates/v_navbar";
        $data['header'] = "templates/v_header";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "customers/v_list_customer";

        $getData = $this->m_customer->retrieveCustomer();
        $data['listCustomer'] = $getData;
        
        $this->load->view('v_home', $data);
    }

    public function Add(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "customers/v_add_customer";

        $this->load->view('v_home', $data);
    }

    public function Save(){
        $customer = $this->m_customer;
		$res = $customer->save();

		if ($res){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Warning!</strong> Failed saved.
			</div>");
			redirect("index.php/customers");
		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Information!</strong> Data has been saved. 
			</div>");
			redirect("index.php/customers");
		}
    }

}

?>