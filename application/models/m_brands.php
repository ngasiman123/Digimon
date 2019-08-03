<?php

class M_brands extends CI_model
{
    
    function getBrands(){
        return $this->db->get('brands');
    }

}


?>