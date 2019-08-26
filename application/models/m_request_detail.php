<?php

class m_request_detail extends CI_Model
{
    
    private $_table = "request_details";
    public $customer_info_no;
    public $sakura_ref_no;
    public $brand_code;
    public $warehouse_code;
    public $manufacture_code;
    public $order_qty;
    public $item_images;

    public function retriveRequestDetail(){
        $query = $this->db->query('SELECT request_no,request_header_id,customer_code, request_date, po_number_customer FROM request_header WHERE deleted_at IS NULL order by request_no');
        return $query->result();
    }


    public function saveDetail(){

    	$this->db->select_max('request_header_id');
        $this->db->where('request_no', $this->input->post('request_no'));
        $ress_header_id = $this->db->get('request_headers')->row();

    	$a = $this->input->post('customer_no_info');
    	$b = count($a);

    	// $config['upload_path'] = base_url().'assets/images/';
    	// $config['allowed_types'] = 'jpg|gif|png';


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

		        $this->db->insert($this->_table,$this);
		        

    		}

		}

    }
    public function retrieveRequestDetailId($request_header_id)
    {
        return $this->db->get_where($this->_table, ["request_header_id" => $request_header_id])->result();

    }
}


?>