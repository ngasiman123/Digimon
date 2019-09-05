<?php

class M_request_detail extends CI_Model
{
    
    private $_table = "request_details";
    public $customer_info_no;
    public $sakura_ref_no;
    public $brand_code;
    public $warehouse_code;
    public $manufacture_code;
    public $order_qty;
    public $item_images;
    public $status;
    public $remark;

    public function retriveRequestDetail(){
        $query = $this->db->query('SELECT request_no,request_header_id,customer_code, request_date, po_number_customer FROM request_header WHERE deleted_at IS NULL order by request_no');
        return $query->result();
    }

    public function retrieveRequestDetailId($request_header_id)
    {
        return $this->db->get_where($this->_table, ["request_header_id" => $request_header_id])->result();
    }
    
    public function retrieveDashboard(){
        $query = "SELECT rh.request_no, rd.customer_info_no , c.name AS customer_name, u.user_name AS created_by
                    , CASE WHEN ra.approve_status IS NULL THEN 'NEW'
	                    WHEN ra.approve_status = 0 THEN 'REJECT'
	                    WHEN ra.approve_status = 3 THEN 'APPROVED'
                        WHEN ra.approve_status = 2 THEN 'REVISI' ELSE 'UNDEFINED' END 'request_status'
                    , CASE WHEN ds.status IS NULL THEN 'NOT YET'
	                    WHEN ds.status = 1 THEN 'PENDING'
                        WHEN ds.status = 2 THEN 'OK' ELSE 'UNDEFINED' END 'drawing_spec_status'
                    , CASE WHEN p.status IS NULL THEN 'NOT YET'
                    	WHEN p.status = 1 THEN 'PENDING'
                        WHEN p.status = 2 THEN 'OK' ELSE 'UNDEFINED' END 'packaging_status'
                    , CASE WHEN b.status IS NULL THEN 'NOT YET'
                    	WHEN b.status = 1 THEN 'PENDING'
                        WHEN b.status = 2 THEN 'OK' ELSE 'UNDEFINED' END 'bom_status'
                    , CASE WHEN r.status IS NULL THEN 'NOT YET'
                    	WHEN r.status = 1 THEN 'PENDING'
                        WHEN r.status = 2 THEN 'OK' ELSE 'UNDEFINED' END 'receive_status'
                    FROM request_details AS rd 
                    INNER JOIN request_headers AS rh ON rh.request_header_id = rd.request_header_id
                    LEFT JOIN request_approves AS ra ON ra.request_header_id = rh.request_header_id
                    LEFT JOIN drawing_specs AS ds ON ds.request_detail_id = rd.request_detail_id
                    LEFT JOIN packagings AS p ON p.drawing_spec_id = ds.drawing_spec_id
                    LEFT JOIN bill_of_materials AS b ON b.packaging_id = p.packaging_id
                    LEFT JOIN receives AS r ON r.bom_id = b.bom_id
                    LEFT JOIN customers AS c ON c.customer_code = rh.customer_code
                    LEFT JOIN users AS u ON u.id = rh.created_by
                    WHERE rh.deleted_at IS NULL";
        
        $sql = $this->db->query($query);
        return $sql->result();
    }

    public function saveDetail(){

    	$this->db->select_max('request_header_id');
        $this->db->where('request_no', $this->input->post('request_no'));
        $ress_header_id = $this->db->get('request_headers')->row();

    	$a = $this->input->post('customer_no_info');
    	$b = count($a);

		if ($b > 0) {
			
			for ($i=0; $i < $b ; $i++) { 
    			$post = $this->input->post();
		        $this->request_header_id = $ress_header_id->request_header_id;
		        $this->customer_info_no = $post["customer_no_info"][$i];
		        $this->sakura_ref_no = $post["sakura_no_ref"][$i];
		        $this->brand_code = $post["brand"][$i];
		        $this->warehouse_code = $post["warehouse"][$i];
		        $this->manufacture_code = $post["manufacture"][$i];
		        $this->order_qty = $post["order_qty"][$i];
		        $this->item_images = str_replace(" ","_",$_FILES['image_ref']['name'][$i]);

		        $this->db->insert($this->_table,$this);
		        

    		}

		}

    }

    public function updateDetail(){

    	$this->db->select_max('request_header_id');
        $this->db->where('request_no', $this->input->post('request_no'));
        $ress_header_id = $this->db->get('request_headers')->row();

    	$a = $this->input->post('customer_no_info');
    	$b = count($a);

		if ($b > 0) {
			
			for ($i=0; $i < $b ; $i++) { 
    			$post = $this->input->post();
		        $request_id = $post['request_detail_id'][$i];
		        $data['customer_info_no'] = $post["customer_no_info"][$i];
		        $data['sakura_ref_no'] = $post["sakura_no_ref"][$i];
		        $data['brand_code'] = $post["brand"][$i];
		        $data['warehouse_code'] = $post["warehouse"][$i];
		        $data['manufacture_code'] = $post["manufacture"][$i];
		        $data['order_qty'] = $post["order_qty"][$i];
		        $data['item_images'] = $_FILES['image_ref']['name'][$i];

		        $this->db->where('request_detail_id', $request_id);
        		$this->db->update("request_details", $data);
		        

    		}

		}

    }
    
    public function retrieveDeleteRow($deleterow)
    {

        $this->db->where('request_detail_id',$deleterow);
        $this->db->delete('request_details');

    }

    public function headerID($id){

        return $query = $this->db->get_where($this->_table,['request_detail_id'=>$id])->row();
    }

    public function updateRequest()
    {
        $post = $this->input->post();

        $id = $post['request_detail_id'];
        if ($post['status']==0) {

            $data['status'] = 1;
            $data['remark'] = $post['drawing_remark'];

        }else{
            $data['status'] = 2;
            $data['remark'] = $post['drawing_remark'];
        }

        $this->db->where('request_detail_id',$id);
        $this->db->update($this->_table,$data);
    }
}


?>