<?php

class M_packaging extends CI_Model
{
    
    private $_table = "packagings";
    // public $packaging_id;
    public $drawing_spec_id;
    public $status;
    public $image;
    public $remark;
    public $inner_box_spec;
    public $outter_box_spec;
    public $created_at;
    public $created_by;
    public $updated_at;
    public $updated_by;
    public $deleted_at; 
    public $deleted_by;

    public function join_table()
    {
        return $query = $this->db->query("SELECT ds.*,rd.*,rh.*,c.name as c_name,u.user_name,ds.status as ds_status
                FROM drawing_specs as ds
                LEFT JOIN request_details as rd ON ds.request_detail_id = rd.request_detail_id
                LEFT JOIN request_headers as rh ON rd.request_header_id = rh.request_header_id
                LEFT JOIN customers as c ON rh.customer_code = c.customer_code
                LEFT JOIN packagings as pc ON ds.drawing_spec_id = pc.drawing_spec_id
                LEFT JOIN users as u ON ds.created_by = u.id
                WHERE rd.status =  2 AND pc.packaging_id is null
            ")->result();

    }

    public function packagingDetail($id)
    {
        return $query = $this->db->query("SELECT rd.*,ds.*,ds.status as ds_status,ds.remark as ds_remark
                FROM drawing_specs as ds
                LEFT JOIN request_details as rd ON ds.request_detail_id=rd.request_detail_id
                WHERE ds.drawing_spec_id=$id
            ")->row();
    }

    public function save(){

        $post =  $this->input->post();
        
        $this->drawing_spec_id = $post['drawing_spec_id'];
        $this->inner_box_spec = $post['inner_box'];
        $this->outter_box_spec = $post['outter_box'];
        // $this->status = $post['status'];
        $this->image = $_FILES['pack_img']['name'];
        // $this->remark = $post['packaging_remark'];
        $this->created_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->db->insert($this->_table,$this);

    }

    public function updateStatus()
    {
        $post = $this->input->post();

        $id = $post['packaging_id'];
        if ($post['status']==0) {

            $data['status'] = 1;
            $data['remark'] = $post['bom_remark'];

        }else{
            $data['status'] = 2;
            $data['remark'] = $post['bom_remark'];
        }

        $this->db->where('packaging_id',$id);
        $this->db->update($this->_table,$data);
    }

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

    public function retrievePackagingDetail($id){

        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,ra.approve_note,ra.approve_status,s.user_name as sales,ds.status,ds.image,ds.remark,ds.sakura_version_no,ds.created_at as ds_create,ds.drawing_spec_id as draw_id,ds.image as ds_img,rd.*,pac.*,pac.status as pac_status,pac.remark as pac_remark
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
                LEFT JOIN packagings as pac
                ON pac.drawing_spec_id = ds.drawing_spec_id
                WHERE ra.approve_status = 3 AND rh.request_header_id=$id
                
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

    public function updaterow()
   {    
        $post = $this->input->post();

        $query = $this->db->get_where($this->_table,['packaging_id'=>$post['packaging_id']])->row();

        if (empty($query)) {
            $this->drawing_spec_id = $post['drawing_spec_id'];
            $this->status = $post['packaging_status'];
            $this->remark = $post['packaging_remark'];
            $this->inner_box_spec = str_replace(" ", "_",$_FILES['inner_box']['name']);
            $this->outter_box_spec = str_replace(" ", "_",$_FILES['outter_box']['name']);
            $this->created_at = date('Y-m-d');
            $this->created_by = $this->session->userdata('id');
            $this->db->insert($this->_table,$this);
        }else{
            
            $packaging_id = $query->packaging_id;
            $data['status'] = $post['packaging_status'];
            $data['remark'] = $post['packaging_remark'];
            $data['inner_box_spec'] = str_replace(" ", "_",$_FILES['inner_box']['name']);
            $data['outter_box_spec'] = str_replace(" ", "_",$_FILES['outter_box']['name']);
            $data['updated_at'] = date('Y-m-d');
            $data['updated_by'] = $this->session->userdata('id');

            $this->db->where('packaging_id',$packaging_id);
            $this->db->update('packagings',$data);
        }

   } 
    

}
