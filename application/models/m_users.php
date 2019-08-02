<?php 
 
class M_users extends CI_Model{
    
    function getUsers(){
		return $this->db->get('tb_users');
    }
    
}