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

    public function retrieveCustomerByID($customer_code){
        return $this->db->get_where($this->_table, ["customer_code" => $customer_code])->row();
    }

    public function save(){
        $post = $this->input->post();
        $this->customer_code = $post["customer_code"];
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->email = $post["email"];
        $this->phone_number = $post["phone_number"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = 1;
        $this->updated_by = 1;

        $this->db->insert($this->_table, $this);
    }

    public function edit(){

    }

    public function delete(){
        $data['updated_at'] = date('Y-m-d');
		
		$this->db->where('customer_code',$customer_code);
        $this->db->update("customers", $data);
    }

}


?>