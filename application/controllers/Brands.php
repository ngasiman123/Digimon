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

        public function Add(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "brands/v_add_brand";

            $this->load->view('v_home', $data);
        }

        public function Save(){
            $brand = $this->m_brand;
            $res = $brand->save();

            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed saved.
                </div>");
                redirect("index.php/brands");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/brands");
            }            
        }

        public function Edit(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "brands/v_edit_brand";

            $brand_code = $this->uri->segment(3);
            $brand = $this->m_brand;
            $res = $brand->retrieveBrandByID($brand_code);

            $data['brand_code'] = $res->brand_code;     
            $data['brand_name'] = $res->brand_name;

            $this->load->view('v_home', $data);
        }

        public function update()
	    {
		$brand = $this->m_brand;
		$res = $brand->update();

            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed Updated.
                </div>");
                redirect("index.php/brands");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/brands");
            }
	    }

    }
    
?>