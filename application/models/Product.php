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

    public function getData($query){
        $this->db->query('SET sql_mode=(SELECT REPLACE(@@sql_mode, "ONLY_FULL_GROUP_BY", ""));');
        $query = $this->db->query($query);
        return $query->result();
    }

    public function getUnit($query){
        $query = $this->db->query($query);
        $data = $query->result();
        return $data;
    }

    // Update Unit Method
    public function updateData($table, $id, $data){
        $this->db->set($data);
        $this->db->where('unit_group', $id);
        $this->db->update($table, $data);
    
        return $this->db->affected_rows() >= 0;
    }

    // Delete Unit
    public function deleteData($table, $id){
        $this->db->where('unit_group', $id);
        $this->db->delete($table);

        return true;
    }
}