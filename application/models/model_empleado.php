<?php

class model_empleado extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getEmpleado($codigoEmpleado) {
        $this->db->select('*');
        $this->db->from('empleados');
        $this->db->where('codigoEmpleado', $codigoEmpleado);
        $query = $this->db->get();
        return $query->row();
    }

}