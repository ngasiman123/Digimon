<?php

class m_auth extends CI_Model
{
    protected $_table = "users";
    public $user;
    public $password;

    public function userLogin($user_name, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_name', $user_name, 'match');
        $this->db->where('password', md5($password), 'match');
        return $this->db->get()->row_array();

    }
}


?>