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

    public function selectMax(){
        $this->db->select_max('unit_group');
        $maxvalue = $this->db->get('product_unit');

        if ($maxvalue->num_rows() > 0) {
            $row = $maxvalue->row();
            return $row->unit_group; // Return the maximum price
        } else {
            return 0; // If no rows are found, return 0 or handle it as per your requirement
        }
    }
}