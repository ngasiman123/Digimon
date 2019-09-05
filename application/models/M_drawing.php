<?php

class M_drawing extends CI_Model
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
        $query = $this->db->query("SELECT rd.request_detail_id,rd.item_images, rh.request_no,rd.customer_info_no,rd.sakura_ref_no,rd.order_qty,rd.status as rd_status, c.name as customer_name,rh.created_at as rh_created_at, u.user_name as sales,us.user_name
		FROM request_details as rd 
		LEFT JOIN request_headers as rh ON rh.request_header_id = rd.request_header_id
        LEFT JOIN users as us ON rh.created_by = us.id
		LEFT JOIN request_approves as ra ON rh.request_header_id = ra.request_header_id
        LEFT JOIN users as u ON ra.approve_by = u.id
		LEFT JOIN customers as c ON c.customer_code = rh.customer_code
		LEFT JOIN drawing_specs as ds ON ds.request_detail_id = rd.request_detail_id
		WHERE ra.approve_status = 3 AND ds.drawing_spec_id is null");
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

    public function drawingDetail($id)
    {
        return $query = $this->db->query("SELECT rd.*,rd.status as rd_status,rd.remark as rd_remark,ds.status as draw_status,ds.*
                FROM request_details as rd
                LEFT JOIN drawing_specs as ds
                ON rd.request_detail_id = ds.request_detail_id
                WHERE rd.request_detail_id = $id
            ")->row();
    }

    public function note($id){
        $post = $this->input->post();
        $query = $this->db->get_where($this->_table,['request_header_id',$id])->row();

        var_dump($query->approve_note);
        exit;
    }

    public function save()
    {
       $post =  $this->input->post();

        $this->request_detail_id = $post['request_detail_id'];
        $this->sakura_version_no = $post['sakura_version_no'];
        // $this->status = $post['status'];
        $this->image = str_replace(" ","_",$_FILES['drawing_img']['name']);
        $this->remark = $post['drawing_remark'];
        $this->created_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->db->insert($this->_table,$this);

    }
    public function updateStatus(){
        $post = $this->input->post();

        $id = $post['drawing_spec_id'];
        if ($post['status']==0) {

            $data['status'] = 1;
            $data['remark'] = $post['packaging_remark'];

        }else{
            $data['status'] = 2;
            $data['remark'] = $post['packaging_remark'];
        }

        $this->db->where('drawing_spec_id',$id);
        $this->db->update($this->_table,$data);
    }


}

?>
