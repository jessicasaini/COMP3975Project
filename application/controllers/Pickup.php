<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pickup extends CI_Controller {


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
			$this->load->library('form_validation');
			
			$userdata = $this->session->userdata('logged_in');
			$id = $userdata['id'];
			
			$this->form_validation->set_rules('pickup_location', 'Pick Up Location', 'required');
			$this->form_validation->set_rules('pickup_time_option', 'Pick Up Time Option', 'required');
			if($this->input->post("pickup_time_option")==2){
				$this->form_validation->set_rules('pickup_time', 'Pick Up Time', 'required');
			}
			if ($this->form_validation->run() == TRUE)
			{
				if(!$this->session->userdata('order_id')){
					$order = $this->reg_model->new_order($id);
					$this->session->set_userdata('order_id', $order[0]['order_id']);
				}
				$this->session->set_userdata('store_id', $this->input->post("pickup_location"));
				$this->session->set_userdata('time_type', $this->input->post("pickup_time_option"));
				$this->session->set_userdata('set_time', $this->input->post("pickup_time"));
				//print_r($_SESSION);
				redirect("menu", "refresh");	
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