<?php
class info_cliente extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function getCliente($id)
    {
        $this->db->where('codigoCliente', $id);
        $query = $this->db->get('clientes'); 
        return $query->result(); 
    }

}