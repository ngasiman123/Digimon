<?php

class m_drawing extends CI_Model
{
    
    private $_table = "drawing_specs";
    public $drawing_spec_id;
    public $request_detail_id;
    public $sakura_version_no;
    public $status;
    public $image;
    public $remark;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by;
    public $updated_by;
    public $deleted_by;

    public function join_table()
    {
        $query = $this->db->query("SELECT ra.*,c.name,u.user_name,ra.approve_status,ra.approve_by,rh.*,us.user_name as name_approve,ra.approve_date
                FROM request_approves as ra
                LEFT JOIN request_headers as rh
                ON ra.request_header_id = rh.request_header_id
                LEFT JOIN users as u
                ON u.id = ra.approve_by
                LEFT JOIN users as us
                ON ra.approve_by = us.id
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                WHERE ra.approve_status = 3
                
            ");
        return  $query->result();
    }

    public function updaterow(){
        $post = $this->input->post();

        $query = $this->db->get_where($this->_table,['request_detail_id'=>$post['request_detail_id']])->row();
        
        if (empty($query)) {
            $this->sakura_version_no = $post['sakura_version'];
            $this->request_detail_id = $post['request_detail_id'];
            $this->status = $post['status'];
            $this->image = str_replace(" ","_",$_FILES['drawing_img']['name']);
            $this->remark = $post['drawing_remark'];
            $this->created_at = date('Y-m-d');
            $this->created_by = $this->session->userdata('id');
            $this->db->insert($this->_table,$this);
        }else{
            
            $id = $query->drawing_spec_id;
            $data['sakura_version_no'] = $post['sakura_version'];
            $data['status'] = $post['status'];
            $data['image'] = str_replace(" ","_",$_FILES['drawing_img']['name']);
            $data['remark'] = $post['drawing_remark'];
            $data['updated_at'] = date('Y-m-d');
            $data['updated_by'] = $this->session->userdata('id');

            $this->db->where('drawing_spec_id',$id);
            $this->db->update('drawing_specs',$data);
        }
    }

    public function retrieveDrawingDetail($id){

        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_note,ra.approve_status,s.user_name as sales,ds.status,ds.image,ds.remark,ds.sakura_version_no,ds.created_at as ds_create,ds.drawing_spec_id as draw_id,rd.*,ds.status as draw_status,ds.remark as draw_remark
                FROM request_headers as rh
                LEFT JOIN customers as c
                ON rh.customer_code = c.customer_code
                LEFT JOIN users as u
                ON u.id = rh.created_by
                LEFT JOIN request_approves as ra
                ON rh.request_header_id = ra.request_header_id
                LEFT JOIN users as s
                ON s.id = ra.approve_by
                LEFT JOIN request_details as rd
                ON rh.request_header_id = rd.request_header_id
                LEFT JOIN drawing_specs as ds
                ON  ds.request_detail_id = rd.request_detail_id
                WHERE ra.approve_status = 3 || rh.request_header_id =$id
                
            ");
        return  $query->result();
    }

    public function note($id){
        $post = $this->input->post();
        $query = $this->db->get_where($this->_table,['request_header_id',$id])->row();

        var_dump($query->approve_note);
        exit;
    }


}

?>
