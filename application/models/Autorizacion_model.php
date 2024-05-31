

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autorizacion_model extends CI_Model {

    public function get_autorizaciones()
    {
        return $this->db->get('laps')->result();
    }

    public function guardar_autorizacion($data, $id)
    {
        $this->db->where("codigoLapdik", $id);
        $this->db->update('laps', $data);
    }

    public function guardar_lap($data)
    {
        $this->db->insert('laps', $data);
    }

}
