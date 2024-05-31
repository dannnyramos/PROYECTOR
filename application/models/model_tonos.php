<?php

class model_tonos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTonoByCodigo($codigoTono) {
        $this->db->select('*');
        $this->db->from('tonos');
        $this->db->where('codigoTono', $codigoTono);
        $query = $this->db->get();
        return $query->row();
    }  

}
