<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
               
                $this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->model('reg_model');
		$this->load->model('food_model');
				
        }
	public function index()
	{
		if(($this->session->userdata('logged_in'))){
			$this->load->library('session'); 
			$this->load->library('form_validation');
			
			$userdata = $this->session->userdata('logged_in');
			$id = $userdata['id'];
			
			$this->form_validation->set_rules('cust_address', 'Address', 'required');
			$this->form_validation->set_rules('delivery_time_option', 'Delivery Time Option', 'required');
			if($this->input->post("delivery_time_option")==2){
				$this->form_validation->set_rules('del_time', 'Delivery Time', 'required');
			}
			if ($this->form_validation->run() == TRUE)
			{
				if(!$this->session->userdata('order_id')){
					$order = $this->reg_model->new_order($id);
					$this->session->set_userdata('order_id', $order[0]['order_id']);
				}
				$this->session->set_userdata('address_id', $this->input->post("cust_address"));
				$this->session->set_userdata('time_type', $this->input->post("delivery_time_option"));
				$this->session->set_userdata('set_time', $this->input->post("del_time"));
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