<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductAddController extends CI_Controller
{
    public $Language,$product,$category;

    public function __construct(){
        parent::__construct();
        $this->load->model('Language');
        $this->load->model('product');
        $this->load->model('category');
    }

    public function index(){
        $query = "SELECT * FROM product_unit
		LEFT JOIN languages ON product_unit.language_id = languages.id GROUP BY unit_group";
        
        $data = [
            'languages' => $this->Language->get_language(),
            'catgories' => $this->category->getCategory()
        ];

        $this->load->view('layout/header');
        $this->load->view('Catelog/addProduct', $data);
        $this->load->view('layout/footer');
    }
}