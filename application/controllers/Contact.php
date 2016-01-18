<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->model('reg_model');

    }
    public function index()
    {

        $data['stores'] = $this->reg_model->get_stores();
        $this->load->view('templates/header.php');
        $this->load->view('contact.php', $data);
        $this->load->view('templates/footer.php');
    }
}