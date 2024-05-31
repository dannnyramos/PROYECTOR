<?php

class model_hilos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHiloByCodigo($codigoHilo) {
        $this->db->select('*');
        $this->db->from('hilos');
        $this->db->where('codigoHilo', $codigoHilo);
        $query = $this->db->get();
        return $query->row();
    }

}
