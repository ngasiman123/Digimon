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

    public function retrieveCustomerGet()
    {
        return $this->db->get('customers')->result();
    }

    public function retrieveZone(){

		return $this->db->get('zones')->result_array();
	}

    public function save(){
        $post = $this->input->post();
        $this->customer_code = $post["customer_code"];
        $this->name = $post["name"];
        $this->address = $post["address"];
        $this->email = $post["email"];
        $this->phone_number = $post["phone_number"];
        $this->zone_code = $post["zone_code"];
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->updated_by = $this->session->userdata('id');

        $this->db->insert($this->_table, $this);
    }

    public function update(){
        $post = $this->input->post();

        $customer_code = $post["customer_code"];
        $data['name'] = $post["customer_name"];
        $data['address'] = $post["address"];
        $data['email'] = $post["email"];
        $data['phone_number'] = $post["phone_number"];
        $data['zone_code'] = $post["zone_code"];
        $data['updated_at'] = date('Y-m-d');
        $data['updated_by'] = $this->session->userdata('id');
        
        $this->db->where('customer_code', $customer_code);
        $this->db->update("customers", $data);
    }

    public function delete(){
        $post = $this->input->post();

        $customer_code = $post["customer_code"];
        $data['name'] = $post["name"];
        $data['address'] = $post["address"];
        $data['email'] = $post["email"];
        $data['phone_number'] = $post["phone_number"];
        $data['zone_code'] = $post["zone_code"];
		$data['deleted_at'] = date('Y-m-d');
		$data['deleted_by'] = $this->session->userdata('id');
        
        $this->db->where('customer_code', $customer_code);
        $this->db->update("customers", $data);
    }

}


?>
