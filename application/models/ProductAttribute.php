<?php

class ProductAttribute extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function createData($data){
        $this->db->insert('product_attribute', $data);
        return $this->db->insert_id();
    }

    public function selectMax(){
        $this->db->select_max('attribute_group');
        $maxvalue = $this->db->get('product_attribute');

        if ($maxvalue->num_rows() > 0) {
            $row = $maxvalue->row();
            return $row->attribute_group; // Return the maximum value
        } else {
            return 0; // If no rows are found, return 0 or handle it as per your requirement
        }
    }

    //Attribute group methods
    public function getAttribute($query){
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""));');
        $query = $this->db->query($query);
        return $query->result();
    }

    public function updateData($id,$query){
        $this->db->where('attribute_group', $id);
        $query = $this->db->query($query);
        return $query->result();
    }
}