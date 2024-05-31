<?php

class model_rollos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getRolloByCodigo($codigoRollo) {
        $this->db->select('*');
        $this->db->from('rollos');
        $this->db->where('codigoRollo', $codigoRollo);
        $query = $this->db->get();
        return $query->row();
    }
}
