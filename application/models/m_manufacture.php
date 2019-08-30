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

    public function retrieveManufactureGet()
    {
        return $this->db->get('manufactures')->result();
    }

    public function retrieveManufactureByID($manufacture_code){
        return $this->db->get_where($this->_table, ["manufacture_code" => $manufacture_code])->row();
    }

    public function Save(){
        $post = $this->input->post();
        $this->manufacture_code = $post["manufacture_code"];
        $this->manufacture_name = $post["manufacture_name"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->updated_by = $this->session->userdata('id');

        $this->db->insert($this->_table, $this);

    }

    public function update()
    {		
		$post = $this->input->post();
		$manufacture_code = $post["manufacture_code"];
		$data['manufacture_name'] = $post["manufacture_name"];
        $data['updated_at'] = date('Y-m-d');
		$data['updated_by'] = $this->session->userdata('id');
		
		$this->db->where('manufacture_code',$manufacture_code);
        $this->db->update("manufactures", $data);
	}

    public function delete()
    {		
		$post = $this->input->post();
		$manufacture_code = $post["manufacture_code"];
		$data['manufacture_name'] = $post["manufacture_name"];
        $data['deleted_at'] = date('Y-m-d');
        $data['deleted_by'] = $this->session->userdata('id');
		
		$this->db->where('manufacture_code',$manufacture_code);
        $this->db->update("manufactures", $data);
	}

}


?>
