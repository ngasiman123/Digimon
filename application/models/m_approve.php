<?php

class m_approve extends CI_Model
{
    protected $_table = "request_approves";
    
    public function join_table(){

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
}
