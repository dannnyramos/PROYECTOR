<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_model extends CI_Model {

    public function guardarCambio($data)
    {
        $this->db->insert('log', $data);
    }

    public function obtenerCambiosPorId($id)
    {
        $this->db->where('idregistro', $id);
        $this->db->order_by('fecha', 'desc');
        $query = $this->db->get('log');
        return $query->result();
    }

}
?>