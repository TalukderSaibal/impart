<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LanguageController extends CI_Controller
{
    public $Language,$product;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Language');
        $this->load->model('product');
    }

    public function index(){
        $query = "SELECT * FROM product_unit
		LEFT JOIN languages ON product_unit.language_id = languages.id GROUP BY unit_group";

		$units = $this->product->getData($query);
        
        $data = [
            'languages' => $this->Language->get_language(),
            'units' => $units
        ];

		if($units){
            $this->load->view('layout/header');
            $this->load->view('Catelog/productUnit', $data);
            $this->load->view('layout/footer');
		}else{
            $this->load->view('layout/header');
            $this->load->view('Catelog/productUnit', $data);
            $this->load->view('layout/footer');
        }
    }

    public function create(){
        echo 'Saikat';
    }
}