<?php

class M_warehouses extends CI_model
{
    function getWarehouses(){
        return $this->db->get('tb_warehouses');
    }
}


?>