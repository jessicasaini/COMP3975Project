<?php
class Register extends CI_Controller {

       public function __construct()
        {
                parent::__construct();
              	$this->load->model('reg_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->database();
        }

	public function index()
	{
				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|max_length[100]|callback_check_db_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[1]|max_length[100]');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|callback_check_phone');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
		
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
		}
		else
		{
			$this->session->set_flashdata('flash_register', 'Registration Successful! Login now to order!');
			$this->reg_model->reg_account();
			redirect("Order", "refresh");
		}
		
	}
		
	function check_phone($value) {
		$value = trim($value);
	        if (preg_match('/^[0-9]{10}$/', $value)) 
	        {
	        	return TRUE;
	        }
	        else 
	        {
	        	$this -> form_validation -> set_message('check_phone', 'Invalid phone number. Must be 10 digits');
	           	return FALSE;
	        }
	    }
	    
	    function check_db_email($value) {
	    	$this -> db -> select('email');
		$this -> db -> from('customer_account');
		$this -> db -> where('email', $this -> input -> post('email_address'));
		$query = $this -> db -> get();
		if($query-> num_rows() > 0){
			$this -> form_validation -> set_message('check_db_email', 'Email in use already by another account.');
			return FALSE;
		}
		return TRUE;
	    	
	    }


	
} 
?>