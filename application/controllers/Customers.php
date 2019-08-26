<?php

class customers extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
        if($this->session->userdata('status') != 'login'){
                redirect('auth');
        }
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
        $data['listZone'] = $this->m_customer->retrieveZone();

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

    public function Edit(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "customers/v_edit_customer";

        $customer_code = $this->uri->segment(3);
		$customer = $this->m_customer;
        $res = $customer->retrieveCustomerByID($customer_code);
        
        $data['customer_code'] = $res->customer_code;
        $data['name'] = $res->name;
        $data['address'] = $res->address;
        $data['email'] = $res->email;
        $data['phone_number'] = $res->phone_number;
        $data['listZone'] = $this->m_customer->retrieveZone();

        $this->load->view('v_home', $data);
    }

    public function delete(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "customers/v_delete_customer";

        $customer_code  = $this->uri->segment(3);
        $customer = $this->m_customer;
        $res = $customer->retrieveCustomerByID($customer_code);

        $data['customer_code'] = $res->customer_code;
        $data['name'] = $res->name;
        $data['address'] = $res->address;
        $data['email'] = $res->email;
        $data['phone_number'] = $res->phone_number;
        $data['listZone'] = $this->m_customer->retrieveZone();

        $this->load->view('v_home', $data);
    }

    public function update()
	{
		$cust = $this->m_customer;
		$res = $cust->update();

		if ($res){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Warning!</strong> Failed Updated.
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
    
    public function deleteControl(){
        $cust = $this->m_customer;
        $res = $cust->delete();

        if ($res){
            $this->session->set_flashdata("msg","<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Failed deleted. 
            </div>");
            redirect("index.php/customers");
        }else{
            $this->session->set_flashdata("msg","<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been deleted. 
            </div>");
            redirect("index.php/customers");
        }

    }

}

?>