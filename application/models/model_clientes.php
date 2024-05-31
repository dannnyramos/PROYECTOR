<?php

class model_clientes extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getClienteByCodigo($codigoCliente) {
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('codigoCliente', $codigoCliente);
        $query = $this->db->get();
        return $query->row();
    }

}
