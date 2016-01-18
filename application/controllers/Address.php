<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
               
                $this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->model('reg_model');
				
        }
	public function index()
	{
		if(($this->session->userdata('logged_in'))){
			$this->load->library('session'); 
			$userdata = $this->session->userdata('logged_in');
			$id = $userdata['id'];
			
			$this -> load -> library('form_validation');
	        	$this -> form_validation -> set_rules('address_name', 'Name', 'min_length[0]|max_length[20]');
	        	$this -> form_validation -> set_rules('apt_number', 'Unit #', 'min_length[0]|max_length[10]');
	  		$this -> form_validation -> set_rules('house_number', 'House #', 'required|min_length[1]|max_length[20]');
	  		$this -> form_validation -> set_rules('street', 'Street', 'required|min_length[1]|max_length[20]');
	  		$this -> form_validation -> set_rules('city', 'City', 'required|min_length[1]|max_length[20]');
	  		$this -> form_validation -> set_rules('delivery_notes', 'Delivery Notes', 'min_length[0]|max_length[400]');
	  		
	       		if ($this->form_validation->run() == TRUE) {
				
				$this->reg_model->insert_address($id);
				redirect("Order_Options", "refresh");
			
			}
			else{
				$data['addresses'] = $this->reg_model->get_cust_address($id);
				$data['stores'] = $this->reg_model->get_stores();
				$this->load->view('templates/header.php');
				$this->load->view('order_type.php', $data);
				$this->load->view('templates/footer.php');	
			}
				
		
		}
		else{	
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
		}	
		
	}
}