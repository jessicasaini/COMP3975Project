<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


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
        $this->load->library('session');


        if(!($this->session->userdata('admin'))){
            $this->load->view('templates/header.php');
            $this->load->view('admin_login.php');
            $this->load->view('templates/footer.php');

        }
        else{
            $data['orders'] = $this->food_model->get_orders();
            $this->load->view('templates/header.php');
            $this->load->view('admin.php', $data);
            $this->load->view('templates/footer.php');
        }

    }
}