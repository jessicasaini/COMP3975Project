<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->model('reg_model');

    }
    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('login_user', 'User', 'trim|required');
        $this->form_validation->set_rules('login_password', 'Password', 'trim|required');
        $login = $this->reg_model->login_admin($this->input->post("login_user"), $this->input->post("login_password"));
        if($login == FALSE){
            $this->session->set_flashdata('flash_login', 'Incorrect user and password combination.');
        }

        if ($this->form_validation->run() != FALSE and $login !=FALSE )
        {

            $array = array('user' => $login[0]['user'], 'password' => $login[0]['password']);
            $_SESSION['admin']= $array;
            $this->session->set_flashdata('flash_login', 'Login successful!');
            //print_r($login);
            redirect("Admin", "refresh");
        }
        else
        {

            $this->load->view('templates/header.php');
            $this->load->view('admin_login.php');
            $this->load->view('templates/footer.php');
        }

    }
}