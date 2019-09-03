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