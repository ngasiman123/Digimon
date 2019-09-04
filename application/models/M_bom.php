<?php

class M_bom extends CI_Model
{
    protected $_table = "bill_of_materials";
    public $bom_id;
    public $packaging_id;
    public $movex_filter_master;
    public $sap_filter_master;
    public $status;
    public $remark;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by;
    public $updated_by;
    public $deleted_by;

    public function join_table(){
        $query = $this->db->query("SELECT rh.*,c.name,u.user_name,us.user_name as sales,pc.created_at as pc_created_at,pc.status as pc_status,pc.packaging_id as pc_id
            FROM packagings as pc
            LEFT JOIN drawing_specs as ds ON pc.drawing_spec_id = ds.drawing_spec_id
            LEFT JOIN request_details as rd ON ds.request_detail_id = rd.request_detail_id
            LEFT JOIN request_headers as rh ON rd.request_header_id = rh.request_header_id
            LEFT JOIN customers as c ON rh.customer_code=c.customer_code
            LEFT JOIN users as u ON rh.created_by=u.id
            LEFT JOIN users as us ON pc.created_by=us.id
            LEFT JOIN bill_of_materials as bom ON pc.packaging_id = bom.packaging_id
            WHERE rd.status = 2 AND bom.packaging_id is null 
            ")->result();

        // var_dump($query);
        // exit;
        return $query;
    }

    public function bomDetail($id)
    {
        $query = $this->db->query("SELECT rd.*,ds.sakura_version_no,ds.image as ds_img,pc.inner_box_spec,pc.outter_box_spec,pc.status as pc_status,pc.image as pc_img,pc.remark as pc_remark
                FROM packagings as pc
                LEFT JOIN drawing_specs as ds ON pc.drawing_spec_id=ds.drawing_spec_id
                LEFT JOIN request_details as rd ON ds.request_detail_id=rd.request_detail_id
                WHERE pc.packaging_id = $id 
            ")->row();

        // var_dump($query);
        // exit;
        return $query;
    }

    public function save(){
        $post =  $this->input->post();
        
        $this->packaging_id = $post['packaging_id'];
        $this->movex_filter_master = $post['movex_filter'];
        $this->sap_filter_master = $post['sap_filter'];
        // $this->status = $post['status'];
        // $this->remark = $post['packaging_remark'];
        $this->created_at = date('Y-m-d');
        $this->created_by = $this->session->userdata('id');
        $this->db->insert($this->_table,$this);
    }

    public function updateStatus(){
        $post = $this->input->post();

        $data['status'] =2 ;
        $data['remark'] = "confirm";
        $data['updated_at'] = date('Y-m-d');
        $data['updated_by'] = $this->session->userdata("id");
        $this->db->where('bom_id',$post['bom_id']);
        $this->db->update($this->_table,$data);
    }

    public function retrieveBOMid($id){

        $query = $this->db->query("SELECT rd.*,ds.remark as ds_remark,ds.sakura_version_no,pc.inner_box_spec,pc.outter_box_spec,pc.packaging_id,pc.created_at as pc_create_at,bom.movex_filter_master,bom.sap_filter_master,bom.status as bom_status,bom.remark as bom_remark
                FROM request_details as rd
                LEFT JOIN drawing_specs as ds
                ON rd.request_detail_id = ds.request_detail_id
                LEFT JOIN packagings as pc
                ON ds.drawing_spec_id = pc.drawing_spec_id
                LEFT JOIN bill_of_materials as bom
                ON pc.packaging_id = bom.packaging_id
                WHERE rd.request_header_id = $id
            ");
        return  $query->result();
    }
    public function updaterow()
    {
        $post = $this->input->post();

        $query = $this->db->get_where($this->_table,['packaging_id',$post['packaging_id']])->row();
        
        if (empty($query)) {
            $this->movex_filter_master = str_replace(" ","_",$_FILES['movex_filter']['name']);
            $this->sap_filter_master = str_replace(" ","_",$_FILES['sap_filter']['name']);
            $this->packaging_id = $post['packaging_id'];
            $this->status = $post['status'];
            $this->remark = $post['bom_remark'];
            $this->created_at = date('Y-m-d');
            $this->created_by = $this->session->userdata('id');
            $this->db->insert($this->_table,$this);
        }else{
            
            $id = $query->packaging_id;
            $data['movex_filter_master'] = $post['movex_filter'];
            $data['sap_filter_master'] = $post['sap_filter'];
            $data['status'] = $post['status'];
            $data['remark'] = $post['bom_remark'];
            $data['updated_at'] = date('Y-m-d');
            $data['updated_by'] = $this->session->userdata('id');

            $this->db->where('packaging_id',$id);
            $this->db->update('bill_of_materials',$data);
        }
    }
}


?>