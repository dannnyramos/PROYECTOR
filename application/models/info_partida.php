<?php
class info_partida extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    public function getPartida($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partidas'); 
        return $query->result(); 
    }
    
    public function getPartida_Rollo($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partidaRollo');
        return $query->result();
    }


    public function getRollo($id)
    {
        $this->db->where('codigoRollo', $id);
        $query = $this->db->get('rollos'); 
        return $query->result(); 
    }

}
