<?php

class m_approve extends CI_Model
{
    protected $_table = "request_approves";
    public $request_approve_id;
    public $request_header_id;
    public $approve_date;
    public $approve_note;
    public $approve_by;
    public $approve_status;


    public function join_table(){

        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_status
                FROM request_headers as rh
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                LEFT JOIN users as u
                ON u.id = rh.created_by
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id
                WHERE approve_status <> 3
            ");
        return  $query->result();
    }

    public function saveApprove()
    {
    	$this->db->select_max('request_header_id');
        $this->db->where('request_no', $this->input->post('request_no'));
        $ress_header_id = $this->db->get('request_headers')->row();

    	$this->request_header_id = $ress_header_id->request_header_id;
    	$this->approve_status = 1;

    	$this->db->insert($this->_table, $this);

    }

    public function retrieveCekApprove($request_header_id)
    {
    	return $this->db->get_where($this->_table, ["request_header_id" => $request_header_id])->row();

    }
    public function cekApprove(){

    	$post = $this->input->post();

    	$id = $post['request_approve_id'];
    	$data['approve_date'] = date('Y-m-d');
    	$data['approve_note'] = $post['note'];
        $data['approve_by'] = $this->session->userdata('id');
    	$data['approve_status'] = $post['cek'];
    	
    	$this->db->where('request_approve_id',$id);
    	$this->db->update('request_approves',$data);
    }
    // public function delete($id){

    //     $this->db->where('request_header_id',$id);
    //     $this->db->delete('request_approves');
    // }
}
