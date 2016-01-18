<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {


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

                    if($this->session->userdata('order_type') == 1){
                        $this->food_model->delivery_order($this->session->userdata('order_id'));
                    }
                    else{
                        $this->food_model->pickup_order($this->session->userdata('order_id'));
                    }
                    $data['items'] = $this->food_model->order_items($this->session->userdata('order_id'));
                    $data['summary']= $this->food_model->get_summary($this->session->userdata('order_id'));
                    $this->load->view('templates/header.php');
                    $this->load->view('checkout.php', $data);
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