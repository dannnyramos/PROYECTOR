<?php

class viewDetail extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getPartida_Lote($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partida_lote');
        return $query->result();
    }

        public function getPedido_Partida($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido_partida');
        return $query->result();
    }

        public function getPedido_Tono($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido_tonos');
        return $query->result();
    }

        public function getAsignacion($id)
    {
        $this->db->where('codigo_asignacion', $id);
        $query = $this->db->get('asignacion'); 
        return $query->result(); 
    }

    public function getLote($id)
    {
        $this->db->where('codigoLote', $id);
        $query = $this->db->get('lotes');
        return $query->result();
    }

    public function getMaquina($id)
    {
        $this->db->where('codigoMaquina', $id);
        $query = $this->db->get('maquinas');
        return $query->result();
    }

    public function getTela($id)
    {
        $this->db->where('codigoTela', $id);
        $query = $this->db->get('telas'); 
        return $query->result(); 
    }

    public function getRollo($id)
    {
        $this->db->where('codigoRollo', $id);
        $query = $this->db->get('rollos'); 
        return $query->result(); 
    }
       public function getTonoByCodigo($codigoTono) {
        $this->db->select('*');
        $this->db->from('tonos');
        $this->db->where('codigoTono', $codigoTono);
        $query = $this->db->get();
        return $query->row();
    }


    public function getTelaByCodigo($codigoTela) {
        $this->db->select('*');
        $this->db->from('telas');
        $this->db->where('codigoTela', $codigoTela);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPartida($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partidas'); 
        return $query->result(); 
    }
    public function getTono($id)
    {
        $this->db->where('codigoTono', $id);
        $query = $this->db->get('tonos'); 
        return $query->result(); 
    }
    
    public function getLotes($id)
    {
        $this->db->where('codigoTote', $id);
        $query = $this->db->get('lotes'); 
        return $query->result(); 
    }

    public function getCliente($id)
    {
        $this->db->where('codigoCliente', $id);
        $query = $this->db->get('clientes'); 
        return $query->result(); 
    }
     public function getProveedor($id)
    {
        $this->db->where('codigoProveedor', $id);
        $query = $this->db->get('proveedores'); 
        return $query->result(); 
    }
    public function getPinterno($id)
    {
        $this->db->where('codigoPinterno', $id);
        $query = $this->db->get('proveedorinterno'); 
        return $query->result(); 
    }
    public function getPexterno($id)
    {
        $this->db->where('codigoPexterno', $id);
        $query = $this->db->get('proveedorexterno'); 
        return $query->result(); 
    }
    public function getHilo($id)
    {
        $this->db->where('codigoHilo', $id);
        $query = $this->db->get('hilos'); 
        return $query->result(); 
    }
    public function getPedido($id)
    {
        $this->db->where('codigoPedido', $id);
        $query = $this->db->get('pedido'); 
        return $query->result(); 
    }

    public function getLap($id)
    {
        $this->db->where('codigoLapdik', $id);
        $query = $this->db->get('laps'); 
        return $query->result(); 
    }

    public function getPartida_Rollo($id)
    {
        $this->db->where('codigoPartida', $id);
        $query = $this->db->get('partida_rollo');
        return $query->result();
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