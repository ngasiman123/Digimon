<?php

class Request extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_manufacture');
        $this->load->model('m_warehouse');
        $this->load->model('m_brand');
        $this->load->model('m_request_header');
        $this->load->model('m_request_detail');
        $this->load->model('m_approve');


        $this->load->helper(array('form', 'url','file'));

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
        $data['body'] = "Request/v_list_request";
        $data['listRequest'] = $this->m_request_header->retrieveRequest();

        // var_dump($data['listRequest']);
        // exit;

        $this->load->view('v_home', $data);
    }
    public function save()
    {    
        $a = count($this->input->post('customer_no_info'));
        
        for ($i=0; $i < $a ; $i++) { 
            
            // $config['upload_path']          = './gambar/';
            // $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = '0';

            // $this->load->library('upload');
            // $this->upload->initialize($config);
            // $image = 'image_ref'[$i];
            // $this->upload->do_upload($image);
            
            // $image_data = $this->upload->data();
            // $file_path = $image_data[full_path];

            $namafile = $_FILES['image_ref']['name'][$i];
            $tmp = $_FILES['image_ref']['tmp_name'][$i];
            $type = $_FILES['image_ref']['type'][$i];
            $error = $_FILES['image_ref']['error'][$i];
            $size = $_FILES['image_ref']['size'][$i];

            move_uploaded_file($tmp, 'uploads/'.$namafile);
        }

        $request_header = $this->m_request_header;
        $request_detail = $this->m_request_detail;
        $request_approve = $this->m_approve;

        $ress_header = $request_header->saveHeader();
        $ress_detail = $request_detail->saveDetail();
        $ress_approve = $request_approve->saveApprove();

        if ($ress_approve){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed saved.
            </div>");
            redirect("request");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been saved. 
            </div>");
            redirect("request");
        }



    }

    public function add(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "Request/v_add_request";
        $data['listCustomer']  = $this->m_customer->retrieveCustomerGet();
        $data['listZone'] = $this->m_customer->retrieveZone();
        $data['listManufacture'] = $this->m_manufacture->retrieveManufactureGet();
        $data['listWarehouse'] = $this->m_warehouse->retrieveWarehouseGet();
        $data['listBrand'] = $this->m_brand->retrieveBrand();


        $this->load->view('v_home', $data);
    }

    public function edit(){
        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "Request/v_edit_request";

        $request_header_id = $this->uri->segment(3);
        $request_header = $this->m_request_header;
        $data['res'] = $request_header->retrieveRequestId($request_header_id);
        $data['listCustomer']  = $this->m_customer->retrieveCustomerGet();
        $data['listRequesDetail'] = $this->m_request_detail->retrieveRequestDetailId($request_header_id);
        $data['listManufacture'] = $this->m_manufacture->retrieveManufactureGet();
        $data['listWarehouse'] = $this->m_warehouse->retrieveWarehouseGet();
        $data['listBrand'] = $this->m_brand->retrieveBrand();

        $this->load->view('v_home', $data);
    }

    public function update(){
        $request_header = $this->m_request_header;
        $request_detail = $this->m_request_detail;
        $request_approve = $this->m_approve;
        $ress_header = $request_header->updateHeader();
        $ress_detail = $request_detail->updateDetail();
        $ress_approve = $request_approve->revisied();

        if ($ress_detail){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Failed update.
            </div>");
            redirect("request");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been update. 
            </div>");
            redirect("request");
        }
    }

    public function delete(){

        $id= $this->uri->segment(3);

        $header = $this->m_request_header->delete($id);
        
        if ($approves){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Ups Something wrong.
            </div>");
            redirect("request");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been delete. 
            </div>");
            redirect("request");
        }
    }

    public function deleterow(){

        $deleterow = $this->uri->segment(3);


        $res = $this->m_request_detail->retrieveDeleteRow($deleterow);

         if ($res){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Warning!</strong> Ups Something wrong.
            </div>");
            redirect("request");
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Information!</strong> Data has been delete. 
            </div>");
            redirect("request");
        }



    }


    public function printRequest(){

        $data['header'] = "templates/v_header";
        $data['navbar'] = "templates/v_navbar";
        $data['sidebar'] = "templates/v_sidebar";
        $data['footer'] = "templates/v_footer";
        $data['pluginjs'] = "templates/v_pluginjs";
        $data['body'] = "print/print";

        $request_header_id = $this->uri->segment(3);
        $request_header = $this->m_request_header;
        $data['res'] = $request_header->retrieveRequestId($request_header_id);
        $data['listCustomer']  = $this->m_customer->retrieveCustomerGet();
        $data['listRequesDetail'] = $this->m_request_detail->retrieveRequestDetailId($request_header_id);
        $data['listManufacture'] = $this->m_manufacture->retrieveManufactureGet();
        $data['listWarehouse'] = $this->m_warehouse->retrieveWarehouseGet();
        $data['listBrand'] = $this->m_brand->retrieveBrand();

        $this->load->view('print/p_request', $data);

    }


}
