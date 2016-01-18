<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_item extends CI_Controller {


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
		
			if($this->session->userdata('order_id')){
				
					$this->food_model->delete_item($this->input->post('order_item_id'));
					$url = $this->session->userdata('url');
					redirect($url, "refresh");
				
			}
		
		}
		else{
			$this->load->view('templates/header.php');
			$this->load->view('index.php');
			$this->load->view('templates/footer.php');
		}
		
	}
}