<?php

class m_auth extends CI_Model
{
    protected $_table = "users";
    public $user;
    public $password;

    public function userLogin($user_name, $password){
        return $this->db->get_where($this->_table, ['user_name'=>$user_name, 'password'=>$password])->row_array();
    }
}


?>