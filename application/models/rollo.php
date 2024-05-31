<?php
	class rollo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_rollo_data() {
        $query = $this->db->get('rollo');
        return $query->result_array();
    }
}