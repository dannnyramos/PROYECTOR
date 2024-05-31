<?php
class info_empleado extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

     public function getEmpleado($id)
    {
        $this->db->where('codigoEmpleado', $id);
        $query = $this->db->get('empleados'); 
        return $query->result(); 
    }

        public function getPlanta($id)
    {
        $this->db->where('codigoPlanta', $id);
        $query = $this->db->get('planta'); 
        return $query->result(); 
    }
}