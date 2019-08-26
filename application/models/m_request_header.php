<?php

class m_request_header extends CI_Model
{
    
    private $_table = "request_headers";
    public $request_no;
    public $request_header_id;
    public $customer_code;
    public $request_date;
    public $po_number_customer;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by = 2;
    public $updated_by = 2;
    public $deleted_by;


    public function retrieveRequest()
    {

        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_status
                FROM request_headers as rh
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                LEFT JOIN users as u
                ON u.id = rh.created_by
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id
            ");
        return  $query->result();
    }
    public function retriveRequestHeader(){
        $query = $this->db->query('SELECT request_no,request_header_id,customer_code, request_date, po_number_customer FROM request_header WHERE deleted_at IS NULL order by request_no');
        return $query->result();
    }

    public function retrieveRequestHeaderJoin($request_header_id)
    {
        // return $this->db->get_where($this->_table, ["request_header_id" => $request_header_id])->row();
        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_status
                FROM request_headers as rh
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                LEFT JOIN users as u
                ON u.id = rh.created_by
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id

                WHERE rh.request_header_id = $request_header_id
            ");
        return $query->row();

    }


    public function saveHeader(){
        $post = $this->input->post();
        $this->request_no = $post["request_no"];
        $this->customer_code = $post["customer_code"];
        $this->po_number_customer = $post["customer_po_no"];
        $this->request_date = date('Y-m-d',strtotime($post['request_date']));
        $this->created_at = date('Y-m-d');
        $this->updated_at = date('Y-m-d');
        $this->created_by = 1;
        $this->updated_by = 1;
        $this->db->insert($this->_table, $this);

    }

    public function getRequestHeader($request_no)
    {
        $this->db->select_max('request_header_id');
        $this->db->where('request_no', $request_no);
        $res = $this->db->get('request_headers');
        return $res;


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
        $data['updated_by'] = 1;
        
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
        $data['updated_at'] = date('Y-m-d');
		$data['deleted_at'] = date('Y-m-d');
		$data['updated_by'] = 1;
		$data['deleted_by'] = 1;
        
        $this->db->where('customer_code', $customer_code);
        $this->db->update("customers", $data);
    }

}


?>