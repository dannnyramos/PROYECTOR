<?php
class info_orden extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

        public function getMaquinas()
    {
        $query = $this->db->get('maquinas');
        return $query->result();
    }

  function getInformacionMaquinas($codigoMaquina)
{
    $this->db->select('maquinas.maquina, maquinas.orden, partidas.partida, tonos.color, tonos.codigo, partidas.totalKgs, pedido.pedido, medidas.composicion, maquinas.tela, partidas.totalRollosJersey, partidas.totalRollosRib, maquinas.fase');
    $this->db->from('maquinas');
    
    $this->db->join('partidas', 'maquinas.codigoPartida = partidas.codigoPartida');
    $this->db->join('pedido', 'partidas.codigoPedido = pedido.codigoPedido');
    $this->db->join('tonos', 'partidas.codigoTono = tonos.codigoTono');
    $this->db->join('medidas', 'partidas.codigoMedida = medidas.codigoMedida');
    $this->db->where('maquinas.codigoMaquina', $codigoMaquina);
    $query = $this->db->get();
    return $query->result();
}

}
?>

