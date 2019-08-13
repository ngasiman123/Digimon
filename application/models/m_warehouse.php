<?php

class m_warehouse extends CI_Model
{
   private $_table = "warehouses";
   public $warehouse_code;
   public $warehouse_name;
   public $created_at;
   public $updated_at;
   public $deleted_at;
   public $created_by = 1;
   public $updated_by = 1;
   public $deleted_by;

   public function retrieveWarehouse(){
       $query = $this->db->query('SELECT warehouse_name, warehouse_code FROM warehouses WHERE deleted_at IS NULL order by warehouse_code ');
       return $query->result();
    }

    public function retrieveWarehouseByID($id){
        return $this->db->get_where($this->_table, ["warehouse_code" => $id ])->row();
    }

    public function Save(){
        $post = $this->input->post();
        $this->warehouse_code = $post["warehouse_code"];
        $this->warehouse_name = $post["warehouse_name"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {		
        $post = $this->input->post();
        $warehouse_code = $post["warehouse_code"];

        $data['warehouse_name'] = $post["warehouse_name"];
        $data['updated_at'] = date('Y-m-d');
		$data['updated_by'] = 1;
		
		$this->db->where('warehouse_code', $warehouse_code);
        $this->db->update("warehouses", $data);
	}
}


?>