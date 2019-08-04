<?php

class m_user extends CI_Model{	
	function retrieveuser(){
		$query = $this->db->query('SELECT user_name,name,address,email FROM users where deleted_at IS NULL');
		return $query->result();
	}
}
