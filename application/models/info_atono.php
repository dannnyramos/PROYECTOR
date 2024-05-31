<?php
class info_asignacion extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getLap($id)
    {
        $this->db->where('codigoLapdik', $id);
        $query = $this->db->get('laps'); 
        return $query->result(); 
    }
}