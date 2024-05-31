<?php
class info_rollos extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTela($id)
    {
        $this->db->where('codigoTela', $id);
        $query = $this->db->get('telas'); 
        return $query->result(); 
    }
    
    
    public function getRollo($id)
    {
        $this->db->where('codigoRollo', $id);
        $query = $this->db->get('rollos'); 
        return $query->result(); 
    }
}