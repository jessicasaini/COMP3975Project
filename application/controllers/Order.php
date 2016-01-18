<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
               
                $this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->model('reg_model');
				
        }
	public function index()
	{
		$this->load->library('session'); 
		$userdata = $this->session->userdata('logged_in');
		$id = $userdata['id'];
		$data['stores'] = $this->reg_model->get_stores();
		$data['addresses'] = $this->reg_model->get_cust_address($id);
		
		
		if(!($this->session->userdata('logged_in'))){
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
			
		}
		else{
			$this->load->view('templates/header.php');
			$this->load->view('order.php', $data);
			$this->load->view('templates/footer.php');
		}	
		
	}
}