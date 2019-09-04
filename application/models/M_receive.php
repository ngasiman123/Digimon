<?php

class M_receive extends CI_Model
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

    public function join_table(){
        $query = $this->db->query("SELECT rh.*,c.name,u.user_name as sales,us.user_name,bom.status as bom_status,bom.bom_id
                FROM bill_of_materials as bom
                LEFT JOIN packagings as pc ON bom.packaging_id=pc.packaging_id
                LEFT JOIN drawing_specs as ds ON pc.drawing_spec_id=ds.drawing_spec_id
                LEFT JOIN request_details as rd ON ds.request_detail_id=rd.request_detail_id
                LEFT JOIN request_headers as rh ON rd.request_header_id=rh.request_header_id
                LEFT JOIN customers as c ON rh.customer_code=c.customer_code
                LEFT JOIN users as u ON bom.created_by=u.id
                LEFT JOIN users as us ON rh.created_by=us.id
                LEFT JOIN receives as re ON bom.bom_id=re.bom_id
                WHERE rd.status = 2 AND re.receive_id is null
             ")->result();

        // var_dump($query);
        // exit();
        return $query;
    }

    public function receiveDetail($id)
    {
        $query = $this->db->query("SELECT rd.customer_info_no,rd.sakura_ref_no,ds.sakura_version_no,rd.brand_code,bom.movex_filter_master,bom.sap_filter_master
                FROM bill_of_materials as bom
                LEFT JOIN packagings as pc ON bom.packaging_id=pc.packaging_id
                LEFT JOIN drawing_specs as ds ON pc.drawing_spec_id=ds.drawing_spec_id
                LEFT JOIN request_details as rd ON ds.request_detail_id=rd.request_detail_id
                LEFT JOIN request_headers as rh ON rd.request_header_id=rh.request_header_id
                WHERE bom.bom_id=$id
            ")->row();

        // var_dump($query);
        // exit();
        return $query;
    }

    public function confirm()
    {   
        $post = $this->input->post();
        $this->bom_id = $post['bom_id'];
        $this->status = "confirm";
        $this->created_at = date('Y-m-d');
        $this->created_by = $this->session->userdata("id");
        $this->db->insert($this->_table,$this);
    }

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
    // public function confirm(){
    //     $post = $this->input->post();
    //     $a = $post['bom_id'];

    //     for ($i=0; $i <= count($a) ; $i++) { 
            
    //         return $query = $this->db->get_where($this->_table,['bom_id'=>$a[$i]])->row();

    //         var_dump($query);

    //         if (empty($query)) {
    //            $this->bom_id = $a[$i];
    //            $this->status = 1;
    //            $this->created_at = date('Y-m-d');
    //            $this->created_by = $this->session->userdata('id');
    //            $this->db->insert($this->_table,$this);
    //         }
    //     }
        

    //     exit;
    // }
}


?>