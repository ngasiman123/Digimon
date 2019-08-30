<?php 
    class m_zone extends CI_Model{
        protected $_table = "zones";
        public $zone_code;
        public $zone_name;
        public $created_by = 1;
        public $updated_by = 1;
        public $deleted_by;
        public $created_at;
        public $updated_at;
        public $deleted_at;

        public function retrieveZone(){
            $query = $this->db->query('SELECT zone_code, zone_name FROM zones WHERE deleted_at IS NULL ORDER BY zone_code');
            return $query->result();
        }

        public function retrieveZoneByID($zone_code){
            return $this->db->get_where($this->_table, ["zone_code"=> $zone_code])->row();
        }

        public function retriveZones()
        {
            return $this->db->get('zones')->result_array();
        }

        public function save(){
            $post = $this->input->post();

            $this->zone_code = $post["zone_code"];
            $this->zone_name = $post["zone_name"];
            $this->created_at = date('Y-m-d');
            $this->updated_at = date('Y-m-d');
            $this->created_by = $this->session->userdata('id');
            $this->updated_by = $this->session->userdata('id');

            $this->db->insert($this->_table, $this);
        }

        public function update(){
            $post = $this->input->post();
            $zone_code = $post["zone_code"];

            $data['zone_name'] = $post["zone_name"];
            $data['updated_at'] = date('Y-m-d');
            $data['updated_by'] = $this->session->userdata('id');
            
            $this->db->where('zone_code', $zone_code);
            $this->db->update("zones", $data);
        }

        public function delete()
        {		
            $post = $this->input->post();
            $zone_code = $post["zone_code"];

            $data['zone_name'] = $post["zone_name"];
            $data['deleted_at'] = date('Y-m-d');
            $data['deleted_by'] = $this->session->userdata('id');
            
            $this->db->where('zone_code', $zone_code);
            $this->db->update("zones", $data);
        }
    }
?>
