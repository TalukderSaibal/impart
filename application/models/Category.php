<?php

class Category extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getCategory() {
        $query = $this->db->get('product_category');
        return $query->result();
    }
}