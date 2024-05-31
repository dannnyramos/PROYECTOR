<?php

class model_proveedorInterno extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getInternoByCodigo($codigoPinterno) {
        $this->db->select('*');
        $this->db->from('proveedorinterno');
        $this->db->where('codigoPinterno', $codigoPinterno);
        $query = $this->db->get();
        return $query->row();
    }

}
