<?php 
    class Zones extends CI_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('m_zone');
        }

        public function index(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "zones/v_list_zone";

            $getData = $this->m_zone->retrieveZone();
            $data['listZone'] =  $getData;

            $this->load->view('v_home', $data);
        }

        public function add(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "zones/v_add_zone";

            $this->load->view('v_home', $data);
        }

        public function edit(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "zones/v_edit_zone";

            $zone_code = $this->uri->segment(3);
            $zone = $this->m_zone;
            $res = $zone->retrievezoneByID($zone_code);
    
            $data['zone_code'] = $res->zone_code;     
            $data['zone_name'] = $res->zone_name;
    
            $this->load->view('v_home', $data);
        }

        public function delete(){
            $data['header'] = "templates/v_header";
            $data['navbar'] = "templates/v_navbar";
            $data['sidebar'] = "templates/v_sidebar";
            $data['footer'] = "templates/v_footer";
            $data['pluginjs'] = "templates/v_pluginjs";
            $data['body'] = "zones/v_delete_zone";

            $zone_code = $this->uri->segment(3);
            $zone = $this->m_zone;
            $res = $zone->retrievezoneByID($zone_code);
    
            $data['zone_code'] = $res->zone_code;     
            $data['zone_name'] = $res->zone_name;
    
            $this->load->view('v_home', $data);
        }

        
        public function Save(){
            $zone = $this->m_zone;
            $res = $zone->save();
            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed saved.
                </div>");
                redirect("index.php/zones");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/zones");
            }            
        }

        public function update(){
            $zone = $this->m_zone;
            $res = $zone->update();
            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed saved.
                </div>");
                redirect("index.php/zones");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been saved. 
                </div>");
                redirect("index.php/zones");
            }            
        }

        public function deleteControl(){
            $zone = $this->m_zone;
            $res = $zone->delete();
            if ($res){
                $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Warning!</strong> Failed updated.
                </div>");
                redirect("index.php/zones");
            }else{
                $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Information!</strong> Data has been deleted. 
                </div>");
                redirect("index.php/zones");
            }            
        }


    }
    
?>