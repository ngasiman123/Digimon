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
	
	public function add()
    {
        $data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "users/v_add_user";
		
		$data['listZone'] = $this->m_user->retrieveZone();	
        $this->load->view('v_home', $data);
	}
	
	public function save()
	{
		$user = $this->m_user;
		$res = $user->save();

		if ($res){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Warning!</strong> Failed saved.
			</div>");
			redirect("index.php/users");
		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Information!</strong> Data has been saved. 
			</div>");
			redirect("index.php/users");
		}
	}

	public function edit()
    {
        $data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "users/v_edit_user";	

		$id = $this->uri->segment(3);
		$user = $this->m_user;
		$res = $user->retrieveUserByID($id);
		

        $data['id'] = $res->id;     
        $data['user_name'] = $res->user_name;
		$data['name'] = $res->name;
		$data['address'] = $res->address;
		$data['email'] = $res->email;
		$data['phone_number'] = $res->phone_number;
		$data['access_level'] = $res->access_level;
        $this->load->view('v_home', $data);
	}

	public function delete(){
		$data['footer'] = "templates/v_footer";
		$data['header'] = "templates/v_header";
		$data['navbar'] = "templates/v_navbar";
		$data['sidebar'] = "templates/v_sidebar";
		$data['pluginjs'] = "templates/v_pluginjs";
		$data['body'] = "users/v_delete_user";	

		$id = $this->uri->segment(3);
		$user = $this->m_user;
		$res = $user->retrieveUserByID($id);

        $data['id'] = $res->id;     
        $data['user_name'] = $res->user_name;
		$data['name'] = $res->name;
		$data['address'] = $res->address;
		$data['email'] = $res->email;
		$data['phone_number'] = $res->phone_number;
		$data['access_level'] = $res->access_level;
        $this->load->view('v_home', $data);
	}
	
	public function update()
	{
		$user = $this->m_user;
		$res = $user->update();

		if ($res){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Warning!</strong> Failed Updated.
			</div>");
			redirect("index.php/users");
		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Information!</strong> Data has been saved. 
			</div>");
			redirect("index.php/users");
		}
	}

	public function deleteProcess()
	{
		$user = $this->m_user;
		$res = $user->delete();

		if ($res){
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Warning!</strong> Failed Deleted.
			</div>");
			redirect("index.php/users");
		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong>Information!</strong> Data has been Deleted. 
			</div>");
			redirect("index.php/users");
		}
	}
}
