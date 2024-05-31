<?php

class Mi_modelo extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        return $this->db->get('mi_tabla')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('mi_tabla', array('id' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('mi_tabla', $data);
    }
}
