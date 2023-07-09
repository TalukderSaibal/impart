<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function index(){

    }

    public function create(){
        $unitBangla  = $this->input->post('unit_Bangla');
        $unitEnglish = $this->input->post('unit_English');
        $unitHindi   = $this->input->post('unit_Hindi');

        echo $unitBangla;
    }
}