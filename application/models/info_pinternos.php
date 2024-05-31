<?php
class info_rollos extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getHilo($id)
    {
        $this->db->where('codigoHilo', $id);
        $query = $this->db->get('hilos'); 
        return $query->result(); 
    }
    
    public function getPinterno($id)
    {
        $this->db->where('codigoPinterno', $id);
        $query = $this->db->get('proveedorinterno'); 
        return $query->result(); 
    }

}