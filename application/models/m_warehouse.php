<?php

class m_warehouse extends CI_Model
{
   private $_table = "warehouses";
   public $warehouse_code;
   public $warehouse_name;
   public $created_at;
   public $updated_at;
   public $deleted_at;
   public $created_by = 6;
   public $updated_by = 6;
   public $deleted_by;

   public function retrieveWarehouse(){
       $query = $this->db->query('SELECT warehouse_name, warehouse_code FROM warehouses WHERE deleted_at IS NULL order by warehouse_code ');
       return $query->result();
    }

    public function retrieveWarehouseByID($id){
        return $this->db->get_where($this->_table, ["warehouse_code" => $id ])->row();
    }
}


?>