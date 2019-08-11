<?php

class m_brand extends CI_Model
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

    public function retrievBrandByID($id){
        return $this->db->get_where($this->_table, ["brand_code" => $id])->row();
    }

    public function Save(){
        $post = $this->input->post();
        $this->brand_code = $post["brand_code"];
        $this->brand_name = $post["brand_name"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = 6;
        $this->updated_by = 6;

        $this->db->insert($this->_table, $this);

    }

}


?>