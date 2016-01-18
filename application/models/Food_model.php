<?php class Food_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();	
                date_default_timezone_set('America/Los_Angeles');			
        }



        public function get_menu_items(){
        	$this->db->select("*");
        	$this->db->from("item");
        	$this->db->where("item_enabled", 1);
        	$query = $this->db->get();
        	
        	$items = $query->result_array();
        	for($i = 0; $i < count($items); $i++ ){
        		$this->db->select("*");
        		$this->db->from("price_config");
        		$this->db->where("item_id", $items[$i]['id']);
        		$query = $this->db->get();
        		$items[$i]['prices'] = $query->result_array();
        	}
        	return $items;	
        }

		public function completed($id){
			$data = array("active"=> 0, "completed" => 1);
			$this->db->where("id", $id);
			$this->db->update("order", $data);

		}

		public function get_orders(){
			$this->db->select("*");
			$this->db->from("store");
			$query = $this->db->get();

			$stores = $query->result_array();

			for($i = 0; $i < count($stores); $i++ ) {
				$this->db->select("*");
				$this->db->from("store_summary");
				$this->db->where("store_id", $stores[$i]['id']);
				$this->db->or_where("store_id", null);
				$query = $this->db->get();
				$stores[$i]['orders'] = $query->result_array();
				for($n = 0; $n < count($stores[$i]['orders']); $n++){
					$this->db->select("*");
					$this->db->from("order_item_view");
					$this->db->where("order_id", $stores[$i]['orders'][$n]['id']);
					$query = $this->db->get();
					$stores[$i]['orders'][$n]['items'] = $query->result_array();
				}
			}
			return $stores;
		}
        
        public function add_item($orderid) {
        	$data = array('order_id' => $orderid,
        			'item_id'=> $this->input->post('item_id'),
        			'quantity' => $this->input->post('quantity'),
        			'price_id' => $this->input->post('item_size')
        			
        		);
        	$this->db->insert('order_item', $data);
        	
        }
        
        public function order_items($orderid){
        	$this->db->select("*");
        	$this->db->from("order_item_view");
        	$this->db->where("order_id", $orderid);
        	$query = $this->db->get();
        	
        	return $query->result_array();
        	
        }
        
        public function delete_item($id){
        	$this->db->delete('order_item', array('id' => $id)); 
        }
        
        public function get_summary($orderid){
        	$this->db->select("*");
        	$this->db->from("summary");
        	$this->db->where("id", $orderid);
        	$query = $this->db->get();

        	return $query->result_array();
        }

		public function delivery_order($id){
			$time_type = $this->session->userdata('time_type');
			if($time_type == 2){
				$time = $this->session->userdata('set_time');
			}
			else{
				$time = date('Y-m-d H:i:s', time() + (60*45));
				
			}

			$data = array(
				'store_loc_id' => null,
				'address_id'=> $this->session->userdata('address_id'),
				'is_pick_up' => 0,
				'order_time' => date('Y-m-d H:i:s', time()),
				'ready_time' => $time
			);
			$this->db->where('id', $id);
			$this->db->update('order', $data);
		}
        	public function pickup_order($id){
			$time_type = $this->session->userdata('time_type');
			if($time_type == 2){
				$time = $this->session->userdata('set_time');
			}
			else{
				$time = date('Y-m-d H:i:s', time() + (60*15));
				
			}
			$data = array(
					'address_id' => null,
					'store_loc_id'=> $this->session->userdata('store_id'),
					'is_pick_up' => 1,
					'order_time' => date('Y-m-d H:i:s', time()),
					'ready_time' => $time
			);
			$this->db->where('id', $id);
			$this->db->update('order', $data);
		}

	public function delivery_order_submit($id){
		$time_type = $this->session->userdata('time_type');
		if($time_type == 2){
			$time = $this->session->userdata('set_time');
		}
		else{
			$time = date('Y-m-d H:i:s', time() + (60*45));

		}
		$payment = $this->input->post('payment');
		$cash = 0;
		$debit = 0;
		$credit = 0;
		$N = count($payment);
		for($i=0; $i < $N; $i++)
		{
			if($payment[$i] == 'cash'){
				$cash = 1;
			}
			if($payment[$i] == 'credit'){
				$credit = 1;
			}
			if($payment[$i] == 'debit'){
				$debit = 1;
			}
		}
		$data = array(
				'active' => 1,
				'store_loc_id' => null,
				'address_id'=> $this->session->userdata('address_id'),
				'is_pick_up' => 0,
				'order_time' => date('Y-m-d H:i:s', time()),
				'ready_time' => $time,
				'cash'=> $cash,
				'debit' => $debit,
				'credit'=> $credit
		);
		$this->db->where('id', $id);
		$this->db->update('order', $data);
	}
	public function pickup_order_submit($id){
		$time_type = $this->session->userdata('time_type');
		if($time_type == 2){
			$time = $this->session->userdata('set_time');
		}
		else{
			$time = date('Y-m-d H:i:s', time() + (60*15));

		}
		$payment = $this->input->post('payment');
		$cash = 0;
		$debit = 0;
		$credit = 0;
		foreach($payment as $type){
			if($type == 'cash'){
				$cash = 1;
			}
			if($type == 'credit'){
				$credit = 1;
			}
			if($type == 'debit'){
				$debit = 1;
			}
		}
		$data = array(
				'active' => 1,
				'address_id' => null,
				'store_loc_id'=> $this->session->userdata('store_id'),
				'is_pick_up' => 1,
				'order_time' => date('Y-m-d H:i:s', time()),
				'ready_time' => $time,
				'cash'=>$cash,
				'debit' => $debit,
				'credit'=> $credit
		);
		$this->db->where('id', $id);
		$this->db->update('order', $data);
	}


}
?>