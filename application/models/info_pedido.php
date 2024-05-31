<?php
class info_pedido extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function getPedido($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido'); 
        return $query->result(); 
    }
            public function getPedido_Partida($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido_partida');
        return $query->result();
    }



}