<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completed extends CI_Controller {


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
        if(($this->session->userdata('admin'))){


            if($this->input->post('order_id')){


                $this->food_model->completed($this->input->post('order_id'));
                $data['orders'] = $this->food_model->get_orders();
                redirect('Admin', "refresh");

            }

        }
        else{
            $this->load->view('templates/header.php');
            $this->load->view('index.php');
            $this->load->view('templates/footer.php');
        }

    }
}