<?php

class model_pedido extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPedidoByCodigo($codigoPedido) {
        $this->db->select('*');
        $this->db->from('pedido');
        $this->db->where('codigoPedido', $codigoPedido);
        $query = $this->db->get();
        return $query->row();
    }


}
