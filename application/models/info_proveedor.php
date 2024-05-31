<?php
class info_rollos extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function getProveedor($id)
    {
        $this->db->where('codigoProveedor', $id);
        $query = $this->db->get('proveedores'); 
        return $query->result(); 
    }

}