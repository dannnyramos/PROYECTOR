<?php

class model_medida extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getMedidasByCodigo($codigoMedida) {
        $this->db->select('*');
        $this->db->from('medidas');
        $this->db->where('codigoMedida', $codigoMedida);
        $query = $this->db->get();
        return $query->row();
    }
}
