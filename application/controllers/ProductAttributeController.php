<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProductAttributeController extends CI_Controller
{
    public $productAttribute,$Language,$category;
    public function __construct(){
        parent::__construct();
        $this->load->model('productAttribute');
        $this->load->model('Language');
        $this->load->model('product');
        $this->load->model('category');
    }

    public function index(){
        $query = "SELECT * FROM  product_attribute
		LEFT JOIN languages ON  product_attribute.language_id = languages.id GROUP BY attribute_group";
        $attributes = $this->productAttribute->getAttribute($query);
        $data = [
            'languages'  => $this->Language->get_language(),
            'attributes' => $attributes
        ];

        $this->load->view('layout/header');
        $this->load->view('Catelog/productAttribute', $data);
        $this->load->view('layout/footer');
    }

    // Product attribute create method
    public function create(){
        $requestBody = file_get_contents('php://input');
        $requestData = json_decode($requestBody, true);

        $formFields = $requestData['formFields'];

        $maxvalue =  $this->productAttribute->selectMax();

        foreach($formFields as $index => $field){
            $languageId = $field['languageId'];
            $language   = $field['language'];
            $fieldValue = $field['fieldValue'];

            $data = array(
                'language_id'     => $languageId,
                'attribute_name'  => $fieldValue,
                'attribute_group' => $maxvalue + 1
            );

            $res = $this->productAttribute->createData($data);

            if (!$res) {
                echo 'Failed to insert record for language: ' . $language;
                return;
            }
        }

        echo 'Successfully created';

    }


    // Product Attribute update method
    public function update(){
        $attributeId = $this->input->post('attributeId');
        $query = 'SELECT * FROM product_attribute WHERE attribute_group = ' . $attributeId;
        $res = $this->productAttribute->updateData($attributeId,$query);

        if($res){
            foreach($res as $row){
                echo json_encode($row->language_id);
            }
        }
    }   
}