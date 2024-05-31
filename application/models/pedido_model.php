<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedido_model extends CI_Model {
    public function getPedido($codigoPedido) {
        $this->db->where('codigoPedido', $codigoPedido);
        $query = $this->db->get('pedido');
        return $query->row(); 
    }
}