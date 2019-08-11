<?php

class m_manufacture extends CI_Model
{
    
    private $_table = "manufactures";
    public $manufacture_code;
    public $manufacture_name;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by = 6;
    public $updated_by = 6;
    public $deleted_by;

    public function retrieveManufacture(){
        $query = $this->db->query('SELECT manufacture_code, manufacture_name FROM manufactures WHERE deleted_at IS NULL order by manufacture_name');
        return $query->result();
    }

    public function retrievManufactureByID($id){
        return $this->db->get_where($this->_table, ["manufacture_code" => $id])->row();
    }

    public function Save(){
        $post = $this->input->post();
        $this->manufacture_code = $post["manufacture_code"];
        $this->manufacture_name = $post["manufacture_name"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = 6;
        $this->updated_by = 6;

        $this->db->insert($this->_table, $this);

    }


}


?>