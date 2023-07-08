<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller
{
    public function index(){
        $this->load->view('layout/header');
        $this->load->view('Catelog/productUnit');
        $this->load->view('layout/footer');
    }

    public function create(){
        echo 'Saikat';
    }
}