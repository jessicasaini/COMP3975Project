<?php
class Admin_logout extends CI_Controller {

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
        $this->session->sess_destroy();
        redirect("Admin", "refresh");

    }

}
?>