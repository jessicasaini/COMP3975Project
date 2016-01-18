<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Options extends CI_Controller {


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
			if($this->input->post('order_type')== 1){
				$this->session->set_userdata('order_type', 1);
				
			}
			else if($this->input->post('order_type')== 2){
				$this->session->set_userdata('order_type', 2);
				
			}
			$data['addresses'] = $this->reg_model->get_cust_address($id);
			$data['stores'] = $this->reg_model->get_stores();
			$this->load->view('templates/header.php');
			$this->load->view('order_type.php', $data);
			$this->load->view('templates/footer.php');
				
		
		}
		else{	
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
		}	
		
	}
}