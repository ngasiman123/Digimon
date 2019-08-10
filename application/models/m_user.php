<?php

class m_user extends CI_Model{
	private $_table = "users";
	public $id;
	public $user_name;
	public $password;
	public $name;
	public $email;
	public $address;
	public $phone_number;
	public $access_level;
	public $created_at;
	public $updated_at;
	public $deleted_at;
	public $created_by = 1;
	public $updated_by = 1;
	public $deleted_by;

	public function retrieveuser(){
		$query = $this->db->query('SELECT id,user_name,name,address,email FROM users where deleted_at IS NULL order by id');
		return $query->result();
	}

	public function retrieveUserByID($id){
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function save()
    {
        $post = $this->input->post();
        $this->user_name = $post["user_name"];
        $this->password = md5($post["password"]);
		$this->name = $post["name"];
		$this->email = $post["email"];
		$this->phone_number = $post["phone_number"];
		$this->address = $post["address"];
		$this->access_level = $post["access_level"];
		$this->created_at = date('Y-m-d');
		$this->updated_at = date('Y-m-d');
		$this->created_by = 1;
		$this->updated_by = 1;
        $this->db->insert($this->_table, $this);
	}
	
	public function update()
    {		
		$post = $this->input->post();
		$id = $post["id"];
		$data['user_name'] = $post["user_name"];
        $data['name'] = $post["name"];
		$data['email'] = $post["email"];
		$data['phone_number'] = $post["phone_number"];
		$data['address'] = $post["address"];
		$data['access_level'] = $post["access_level"];
		$data['updated_at'] = date('Y-m-d');
		$data['updated_by'] = 1;
		
		$this->db->where('id',$id);
        $this->db->update("users", $data);
	}
}
