<?php

class M_manufactures extends CI_Model{

    function getManufactures(){
        return $this->db->get('manufactures');
    }

}