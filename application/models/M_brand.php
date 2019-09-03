<?php

class M_brand extends CI_Model
{
    
    private $_table = "brands";
    public $brand_code;
    public $brand_name;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by = 2;
    public $updated_by = 2;
    public $deleted_by;

    public function retrieveBrand(){
        $query = $this->db->query('SELECT brand_code, brand_name FROM brands WHERE deleted_at IS NULL order by brand_name');
        return $query->result();
    }

    public function retrieveGetBrand(){
        return $this->db->get('brands')->result_array();
    }

    public function retrieveBrandByID($brand_code){
        return $this->db->get_where($this->_table, ["brand_code" => $brand_code])->row();
    }

    public function Save(){
        $post = $this->input->post();
        $this->brand_code = $post["brand_code"];
        $this->brand_name = $post["brand_name"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->updated_by = $this->session->userdata('id');

        $this->db->insert($this->_table, $this);

    }

    public function update()
    {		
        $post = $this->input->post();
        $brand_code = $post["brand_code"];

        $data['brand_name'] = $post["brand_name"];
        $data['updated_at'] = date('Y-m-d');
		$data['updated_by'] =  $this->session->userdata('id');
		
		$this->db->where('brand_code', $brand_code);
        $this->db->update("brands", $data);
	}

    public function delete(){
        $post = $this->input->post();
        $brand_code = $post["brand_code"];

        $data['brand_name'] = $post["brand_name"];
        $data['deleted_at'] = date('Y-m-d');
        $data['deleted_by'] = $this->session->userdata('id');
		
		$this->db->where('brand_code', $brand_code);
        $this->db->update("brands", $data);
    }
}


?>
