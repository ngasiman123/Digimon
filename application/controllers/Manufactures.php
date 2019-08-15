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

        public function Add(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "manufactures/v_add_manufacture";
            
            $this->load->view('v_home', $data);
        }

        public function Save(){
            $manufacture = $this->m_manufacture;
            $res = $manufacture->save();

            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed saved.
                </div>");
                redirect("index.php/manufactures");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/manufactures");
            }
        }

        public function edit()
        {
            $data['footer'] = "templates/v_footer";
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "manufactures/v_edit_manufacture";	

            $manufacture_code = $this->uri->segment(3);
            $manufacture = $this->m_manufacture;
            $res = $manufacture->retrieveManufactureByID($manufacture_code);
            
            $data['manufacture_code'] = $res->manufacture_code;     
            $data['manufacture_name'] = $res->manufacture_name;
            $this->load->view('v_home', $data);
        }

        public function delete()
        {
            $data['footer'] = "templates/v_footer";
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "manufactures/v_delete_manufacture";	

            $manufacture_code = $this->uri->segment(3);
            $manufacture = $this->m_manufacture;
            $res = $manufacture->retrieveManufactureByID($manufacture_code);
            
            $data['manufacture_code'] = $res->manufacture_code;     
            $data['manufacture_name'] = $res->manufacture_name;
            $this->load->view('v_home', $data);
        }

        public function update()
	    {
            $manufactures = $this->m_manufacture;
            $res = $manufactures->update();

            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed Updated.
                </div>");
                redirect("index.php/manufactures");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/manufactures");
            }
        }
        
        public function deleteControl(){
            $manufacture = $this->m_manufacture;
            $rest = $manufacture->delete();

            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed deleted.
                </div>");
                redirect("index.php/manufactures");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been deleted. 
                </div>");
                redirect("index.php/manufactures");
            }

        }

    }
    
?>