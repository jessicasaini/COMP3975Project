<?php
class Login extends CI_Controller {

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
		$this->form_validation->set_rules('login_email_address', 'Email', 'trim|required');
		$this->form_validation->set_rules('login_password', 'Password', 'trim|required');
		$login = $this->reg_model->login_user($this->input->post("login_email_address"), $this->input->post("login_password"));
		if($login == FALSE){
			$this->session->set_flashdata('flash_login', 'Incorrect email and password combination.');
		}
	
		if ($this->form_validation->run() != FALSE and $login !=FALSE )
		{	
			
			$this->session->set_userdata("logged_in", $login[0]);
			$this->session->set_flashdata('flash_login', 'Login successful!');
			redirect("Order", "refresh");
		}
		else
		{
			
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
		}
		
	}
		



	
} 
?>