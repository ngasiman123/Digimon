<?php

class m_packaging extends CI_Model
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


    public function retrievePackagingJoin(){

        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_status,ra.approve_note,s.user_name as sales
                FROM request_headers as rh
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                LEFT JOIN users as u
                ON u.id = rh.created_by
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id
                LEFT JOIN users as s
                ON s.id = ra.approve_by
                WHERE ra.approve_status = 3
                
            ");
        return  $query->result();
    }

    public function retrievePackagingHeader($id){

        // $data = $this->db->get_where($this->_table,["request_header_id",$id])->row();

        return $query = $this->db->query("SELECT rh.*,ra.approve_note,ra.approve_status
                FROM request_headers as rh
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id
                WHERE rh.request_header_id = '$id' AND
                ra.approve_status = 3                
            ")->row();

    }
    

}


?>