<?php
class tela extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_tela_data() {
        $query = $this->db->get('tela');
        return $query->result_array();
    }
}