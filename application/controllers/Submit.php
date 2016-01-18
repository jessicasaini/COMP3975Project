<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller {


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


                $this->load->library('form_validation');
                $this->form_validation->set_rules('payment[]', 'Payment Type', 'required');


                if ($this->form_validation->run() == TRUE)
                {
                    if($this->session->userdata('order_type') == 1){
                        $this->food_model->delivery_order_submit($this->session->userdata('order_id'));
                    }
                    else{
                        $this->food_model->pickup_order_submit($this->session->userdata('order_id'));
                    }
                    $data['items'] = $this->food_model->order_items($this->session->userdata('order_id'));
                    $data['summary']= $this->food_model->get_summary($this->session->userdata('order_id'));
                   // $array_items = array('order_type' => '', 'order_id' => '', 'address_id' => '', 'time_type' => '', 'set_time' => '', 'summary' =>'');
                    //$this->session->unset_userdata($array_items);
                    $this->session->unset_userdata('order_id');
                    $this->session->unset_userdata('order_type');
                    $this->session->unset_userdata('address_id');
                    $this->session->unset_userdata('time_type');
                    $this->session->unset_userdata('set_time');
                    $this->session->unset_userdata('summary');
                    $this->session->unset_userdata('store_id');
                    $this->load->view('templates/header.php');
                    $this->load->view('submitted.php', $data);
                    $this->load->view('templates/footer.php');
                }
                else{
                    $this->session->set_flashdata('errors', 'You must select at least one payment type!');
                    $data['items'] = $this->food_model->order_items($this->session->userdata('order_id'));
                    $data['summary']= $this->food_model->get_summary($this->session->userdata('order_id'));
                    $this->load->view('templates/header.php');
                    $this->load->view('checkout.php', $data);
                    $this->load->view('templates/footer.php');
                }

            } else{
                $this->load->view('templates/header.php');
                $this->load->view('home.php');
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