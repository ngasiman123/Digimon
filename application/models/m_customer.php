<?php

class m_customer extends CI_Model
{
    
    private $_table = "customers";
    public $customer_code;
    public $name;
    public $address;
    public $email;
    public $phone_number;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by = 2;
    public $updated_by = 2;
    public $deleted_by;

    public function retrieveCustomer(){
        $query = $this->db->query('SELECT customer_code, name, address, email, phone_number FROM customers WHERE deleted_at IS NULL order by name');
        return $query->result();
    }

    public function retrieveCustomerByID($id){
        return $this->db->get_where($this->_table, ["customer_code" => $id])->row();
    }

}


?>