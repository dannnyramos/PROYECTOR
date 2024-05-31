<?php

class model_proveedorExterno extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getExternoByCodigo($codigoPexterno) {
        $this->db->select('*');
        $this->db->from('proveedorexterno');
        $this->db->where('codigoPexterno', $codigoPexterno);
        $query = $this->db->get();
        return $query->row();
    }

}
