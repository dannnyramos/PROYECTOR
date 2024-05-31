<?php

class model_telas extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTelaByCodigo($codigoTela) {
        $this->db->select('*');
        $this->db->from('telas');
        $this->db->where('codigoTela', $codigoTela);
        $query = $this->db->get();
        return $query->row();
    }


}
