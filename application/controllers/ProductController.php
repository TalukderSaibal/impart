<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends CI_Controller
{
    public $input,$product;
    public function __construct(){
        parent::__construct();
        $this->load->model('product');
    }

    public function index(){

    }

    public function create(){

        $requestBody = file_get_contents('php://input');
        $requestData = json_decode($requestBody, true);

        $languageFields = $requestData['languageFields'];

        foreach ($languageFields as $field) {
            $languageId = $field['languageId'];
            $language = $field['language'];
            $fieldValue = $field['fieldValue'];

            $data = array(
                'language_id' => $languageId,
                'unit_name' => $fieldValue,
            );
        
            $res = $this->product->insert($data);
        
            if (!$res) {
                echo 'Failed to insert record for language: ' . $language;
                return;
            }
        }

        echo 'Successfully created';
    }
}