<?php

class M_request_header extends CI_Model
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
    public $created_by;
    public $updated_by; 
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
                WHERE ra.approve_status = 1 || ra.approve_status =2 || ra.approve_status=0
                
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
        $query = $this->db->query("SELECT rh.*,c.name,c.customer_code,u.user_name,ra.approve_status,ra.approve_note
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
    public function retrieveRequestBOM(){

        $query = $this->db->query("SELECT rh.*,ra.approve_by,ra.approve_date,u.user_name,c.name
            FROM request_approves as ra
            LEFT JOIN request_headers as rh
            ON ra.request_header_id = rh.request_header_id
            LEFT JOIN customers as c
            ON rh.customer_code = c.customer_code
            LEFT JOIN users as u
            ON ra.approve_by = u.id
            WHERE ra.approve_status = 3              
            ");
        return  $query->result();
    }

    public function retrieveBOMid($id){
        $query = $this->db->get_where($this->_table,['request_header_id'],$id)->row();

        return $query;
    }

    public function retrieveReceive()
    {
        $query = $this->db->query("SELECT rh.*,ra.approve_by,ra.approve_date,u.user_name,c.name,us.user_name as po_create
            FROM request_approves as ra
            LEFT JOIN request_headers as rh
            ON ra.request_header_id = rh.request_header_id
            LEFT JOIN customers as c
            ON rh.customer_code = c.customer_code
            LEFT JOIN users as u
            ON ra.approve_by = u.id
            LEFT JOIN users as us
            ON rh.created_by = us.id
            WHERE ra.approve_status = 3              
            ");

        // var_dump($query->result());
        // exit;
        return $query->result();
    }

    public function saveHeader(){
        $post = $this->input->post();
        $this->request_no = $post["request_no"];
        $this->customer_code = $post["customer_code"];
        $this->po_number_customer = $post["customer_po_no"];
        $this->request_date = date('Y-m-d',strtotime($post['request_date']));
        $this->created_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');

        $this->db->insert($this->_table, $this);

    }

    public function retrieveRequestId($request_header_id)
    {
        return $this->db->get_where($this->_table, ["request_header_id" => $request_header_id])->row();
    }

    public function getRequestHeader($request_no)
    {
        $this->db->select_max('request_header_id');
        $this->db->where('request_no', $request_no);
        $res = $this->db->get('request_headers');
        return $res;


    }

    public function updateHeader(){

        $post = $this->input->post();
        $request_header_id = $post['request_header_id'];
        $data['customer_code'] = $post['customer_code'];
        $data['po_number_customer'] = $post['customer_po_no'];
        $data['updated_at'] = date('Y-m-d');
        $data['updated_by'] = $this->session->userdata('id');

        $this->db->where('request_header_id', $request_header_id);
        $this->db->update("request_headers", $data);
    }

    public function delete($id){
       
       $data['deleted_at'] = date('Y-m-d');
       $data['deleted_by'] = $this->session->userdata('id');
       $this->db->where('request_header_id',$id);
       $this->db->update('request_headers',$data);

    }

}


?>