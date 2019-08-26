<?php

class warehouses extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_warehouse');

        if($this->session->userdata('status') != 'login'){
                redirect('auth');
        }
    }

    public function index(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "warehouses/v_list_warehouse";

        $getData = $this->m_warehouse->retrieveWarehouse();
        $data['listWarehouse'] = $getData;

        $this->load->view('v_home', $data);
    }

    public function Add(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "warehouses/v_add_warehouse";

        $this->load->view('v_home', $data);
    }

    public function Save(){
        $warehouse = $this->m_warehouse;
        $res = $warehouse->Save();

        if ($res) {
            $this->session->flashdata("msg", 
            "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Warning !</b> Failed Saved.
            </div>");
            redirect("index.php/warehouses");
        } else {
            $this->session->flashdata("msg", 
            "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Information!</b> Data has been Saved.
            </div>");
            redirect("index.php/warehouses");
        }
        
    }
    public function Edit(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "warehouses/v_edit_warehouse";

        $warehouse_code = $this->uri->segment(3);
        $warehouse = $this->m_warehouse;
        $res = $warehouse->retrieveWarehouseByID($warehouse_code);

        $data['warehouse_code'] = $res->warehouse_code;     
        $data['warehouse_name'] = $res->warehouse_name;

        $this->load->view('v_home', $data);
    }

    public function delete(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "warehouses/v_delete_warehouse";

        $warehouse_code = $this->uri->segment(3);
        $warehouse = $this->m_warehouse;
        $res = $warehouse->retrieveWarehouseByID($warehouse_code);

        $data['warehouse_code'] = $res->warehouse_code;     
        $data['warehouse_name'] = $res->warehouse_name;

        $this->load->view('v_home', $data);
    }

    public function update()
    {
    $warehouse = $this->m_warehouse;
    $res = $warehouse->update();

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed Updated.
            </div>");
            redirect("index.php/warehouses");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect("index.php/warehouses");
        }
    }

    public function deleteControl()
    {
    $warehouse = $this->m_warehouse;
    $res = $warehouse->delete();

        if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed deleted.
            </div>");
            redirect("index.php/warehouses");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been deleted. 
            </div>");
            redirect("index.php/warehouses");
        }
    }

}


?>