<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageController extends CI_Controller
{
    public $Language;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Language');
    }

    public function index(){
        $data['languages'] = $this->Language->get_language();
        $this->load->view('layout/header');
        $this->load->view('Catelog/productUnit', $data);
        $this->load->view('layout/footer');
    }

    public function create(){
        echo 'Saikat';
    }
}