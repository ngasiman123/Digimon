<?php

class m_receive extends CI_Model
{
    protected $_table = "receives";
    public $receive_id;
    public $bom_id;
    public $status;
    public $created_at;
    public $updated_at;
    public $deleted_at;
    public $created_by;
    public $updated_by;
    public $deleted_by;

    public function retrieveReceiveId($id){

        $query = $this->db->query("SELECT rd.*,ds.remark as ds_remark,ds.sakura_version_no,pc.inner_box_spec,pc.outter_box_spec,pc.packaging_id,pc.created_at as pc_create_at,bom.movex_filter_master,bom.sap_filter_master,bom.status as bom_status,bom.remark as bom_remark,bom.created_at as bom_created_at,bom.movex_filter_master,bom.sap_filter_master,bom.bom_id
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
    public function confirm(){
        $post = $this->input->post();
        $a = $post['bom_id'];

        for ($i=0; $i <= count($a) ; $i++) { 
            
            return $query = $this->db->get_where($this->_table,['bom_id'=>$a[$i]])->row();

            var_dump($query);

            if (empty($query)) {
               $this->bom_id = $a[$i];
               $this->status = 1;
               $this->created_at = date('Y-m-d');
               $this->created_by = $this->session->userdata('id');
               $this->db->insert($this->_table,$this);
            }
        }
        

        exit;
    }
}


?>