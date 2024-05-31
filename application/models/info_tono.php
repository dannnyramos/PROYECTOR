<?php
class info_rollos extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTono($id)
    {
        $this->db->where('codigoTono', $id);
        $query = $this->db->get('tonos'); 
        return $query->result(); 
    }
    
    public function getPedido_Tono($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido_tonos');
        return $query->result();
    }
    
}