<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
				$this->load->helper('form');
				$this->load->model('reg_model');
				
        }
	public function index()
	{
		
		$this->load->view('templates/header.php');
		$this->load->view('home.php');
		$this->load->view('templates/footer.php');
	}
}