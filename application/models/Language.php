<?php

class Language extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_language() {
        $query = $this->db->get('languages');
        return $query->result();
    }
}