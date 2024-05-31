<?php

class model_partidas extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPartidaByCodigo($codigoPartida) {
        $this->db->select('*');
        $this->db->from('partidas');
        $this->db->where('codigoPartida', $codigoPartida);
        $query = $this->db->get();
        return $query->row();
    }

}
