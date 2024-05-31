<?php

class model_proveedor extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getProveedorByCodigo($codigoProveedor) {
        $this->db->select('*');
        $this->db->from('proveedores');
        $this->db->where('codigoProveedor', $codigoProveedor);
        $query = $this->db->get();
        return $query->row();
    }

}
