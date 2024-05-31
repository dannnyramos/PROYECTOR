<?php
class info_asignacion extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAsignacion($id)
    {
        $this->db->where('codigoAsignacion', $id);
        $query = $this->db->get('asignacion'); 
        return $query->result(); 
    }

    public function getMaquina($id)
    {
        $this->db->where('codigoMaquina', $id);
        $query = $this->db->get('maquinas');
        return $query->result();
    }

    public function getPartida($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partidas'); 
        return $query->result(); 
    }

    public function getTono($id)
    {
        $this->db->where('codigoTono', $id);
        $query = $this->db->get('tonos'); 
        return $query->result(); 
    }

    public function getLote($id)
    {
        $this->db->where('codigoLote', $id);
        $query = $this->db->get('lotes'); 
        return $query->result(); 
    }

    public function getLoteAsignacion_Lote($id)
    {
        $this->db->where('codigoLote', $id);
        $query = $this->db->get('asignacionLote');
        return $query->result();
    }
}