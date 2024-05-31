<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariomodel extends CI_Model {
    
    public function obtener_rol_usuario($idUsuario) {
        $this->db->select('Rol');
        $this->db->where('idUsuario', $idUsuario);
        $query = $this->db->get('usuarios');
        $result = $query->row();
        if ($result) {
            return $result->Rol;
        } else {
            return false; 
        }
    }
}
