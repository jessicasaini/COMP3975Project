<?php class Reg_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();				
        }
        
        public function new_order($id){
        	$data = array(
        			'customer_id' => $id
        		);
        	$this->db->insert("order", $data);
        	
        	$this->db->select("max(id) as order_id");
        	$this->db->from("order");
        	$this->db->where("customer_id", $id);
        	$query = $this->db->get();
        	return $query->result_array();
        	
        }
        
        public function reg_account(){
        	date_default_timezone_set('America/Los_Angeles');	
        	 $data = array  (
        	 			'email' => $this-> input -> post('email_address'),
			       		'first_name' => $this -> input -> post('first_name'),
					'last_name' => $this -> input -> post('last_name'),
					'password' => md5($this -> input -> post('password')),
					'phone' => $this -> input -> post ('phone'),
	                      		'created_date' => date('Y-m-d H:i:s', time())
	                      	);
	       	 $this -> db -> insert('customer_account', $data);
        
        }
        
        public function login_user($email, $password){
        	$this->db->select('*');
        	$this->db->from("customer_account");
        	$this->db->where("email", $email);
        	$this->db->where("password", md5($password));
        	$query = $this->db->get();
        	
        	if($query->num_rows() > 0){
        		return $query->result_array();
        	}
        	return false;
        	
        }


		public function login_admin($email, $password){
			$this->db->select('*');
			$this->db->from("admin");
			$this->db->where("user", $email);
			$this->db->where("password", md5($password));
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->result_array();
			}
			return false;

		}
        public function get_stores(){
        	$this->db->select("*");
        	$this->db->from("store");
        	$query = $this->db->get();
        	return $query->result_array();	
        }
        
        public function get_cust_address($id){
        	$this->db->select("*");
        	$this->db->from("customer_address_view");
        	$this->db->where("customer_id", $id);
        	$query = $this->db->get();
        	return $query->result_array();

        }
        
        public function insert_address($id){
        	
        	$data = array('customer_id'=> $id,
        			'house_number' => $this->input->post("house_number"),
        			'street' => $this->input->post("street"),
        			'city' => $this->input->post("city"),
        			'delivery_notes' => $this->input->post("delivery_notes")
        		);
        		
        	if($this->input->post('address_name')!= ''){
        		$data['address_name'] = $this->input->post("address_name");
        	}
        	if($this->input->post('apt_number')!= ''){
        		$data['apt_number'] = $this->input->post("apt_number");
        	}
        	if($this->input->post('delivery_notes') != ''){
        		$data['delivery_notes'] = $this->input->post("delivery_notes");
        	}
        	$this->db->insert("customer_address", $data);
        }

		public function get_site_info(){
			$this->db->select("*");
			$this->db->from("website_config");
			$query = $this->db->get();
			return $query->result_array();
		}
        	
}
?>