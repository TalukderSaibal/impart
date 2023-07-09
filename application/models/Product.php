<?php

class Product extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        $this->db->insert('product_unit', $data);
        return $this->db->insert_id();
    }

    public function getGroup(){
        $query = $this->db->get('product_unit');

        return $query->result();
    }
}