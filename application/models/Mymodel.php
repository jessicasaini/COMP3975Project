<?php
class mymodel extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		public function get()
		{
				
				
						$query = $this->db->get('customer_account');
						return $query->result_array();
			

			
		}
}