<?php

class MUsuarios extends CI_Model
{
    function validUser($Usuario, $Password)
    {
        $this->db->select('IdUsuario, Nombre, ApellidoPaterno,ApellidoMaterno, CorreoElectronico, Password');
        $this->db->where('CorreoElectronico', $Usuario);
        $this->db->where('Password', $Password);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    function validUserCorreo($Usuario, $Password)
    {
        $this->db->select('IdUsuario, Nombre, ApellidoPaterno,ApellidoMaterno, CorreoElectronico, Password');
        $this->db->where('CorreoElectronico', $Usuario);
        $this->db->where('Password', $Password);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    function updatePasswordPersonal($data){
        $this->db->where('IdUsuario', $data['IdUsuario']);
        $this->db->update('usuarios', $data);
        return $data;
    }

    public function insertarUsuario($data)
    {
        $this->db->insert('usuarios', $data);
        return $this->db->insert_id();
    }
} ?>