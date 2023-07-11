<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends CI_Controller
{
    public $input,$product,$Language,$db;
    public function __construct(){
        parent::__construct();
        $this->load->model('product');
        $this->load->model('Language');
        $this->load->database();
    }

    public function index(){

    }

    public function create(){

        $requestBody = file_get_contents('php://input');
        $requestData = json_decode($requestBody, true);

        $languageFields = $requestData['languageFields'];

        $maxvalue =  $this->product->selectMax();

        foreach ($languageFields as $index => $field) {
            $languageId = $field['languageId'];
            $language = $field['language'];
            $fieldValue = $field['fieldValue'];

            $data = array(
                'language_id' => $languageId,
                'unit_name' => $fieldValue,
                'unit_group' => $maxvalue + 1
            );
        
            $res = $this->product->insert($data);
        
            if (!$res) {
                echo 'Failed to insert record for language: ' . $language;
                return;
            }
        }

        echo 'Successfully created';
    }

    public function unitEdit($id){

        $query = 'SELECT * FROM product_unit 
        JOIN languages ON product_unit.language_id = languages.id
        WHERE product_unit.unit_group = ' . $id;

        $res = $this->product->getUnit($query);

        if($res){
            $data = [
                'languages' => $this->Language->get_language(),
                'units' => $res,
            ];
            $this->load->view('layout/header');
            $this->load->view('Catelog/productUnitEdit', $data);
            $this->load->view('layout/footer');
        }
    }

    //Product Unit Update
    public function update(){
        // $languageFields = $this->input->post('languageFields');

        $requestData = json_decode(file_get_contents('php://input'), true);
        $languageFields = $requestData['languageFields'];

        foreach ($languageFields as $field) {
            $unitGroupId = $field['unitGroupId'];
            $language    = $field['language'];
            $fieldValue  = $field['fieldValue'];

            $data = array(
                'unit_name' => $fieldValue,
            );

            $res = $this->product->updateData('product_unit',$unitGroupId, $data);
        
            if (!$res) {
                echo 'Failed to update record for language: ' . $language;
                return;
            }
        }
        echo 'Successfully update';
    }

    //Unit Delete
    public function delete(){
        $id = $this->input->post('id');
        $res = $this->product->deleteData('product_unit',$id);

        if($res){
            echo 'Successfully deleted';
            return;
        }
    }
}