<?php

class M_customers extends CI_model
{
    
    function getCustomers(){
        return $this->db->get('tb_customers');
    }

}


?>