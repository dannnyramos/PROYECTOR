<?php
class partidam extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPartidas()
    {
        $query = $this->db->get('partidas');
        return $query->result();
    }

    function getInformacionPartida($codigoPartida)
    {
        $this->db->select('partidas.partida, partida_rollo.codigoRollo, rollos.codigo, rollos.KgInicial, rollos.KgFinal,rollos.comentarios, rollos.metros, rollos.yardas,  telas.tipo AS tipoTela, telas.composicion AS composicionTela, telas.pesoGrs AS pesoGrsTela');
        $this->db->from('partidas');
        $this->db->join('partida_rollo', 'partida_rollo.codigoPartida = partidas.codigoPartida');
        $this->db->join('rollos', 'rollos.codigoRollo = partida_rollo.codigoRollo');
        $this->db->join('telas', 'telas.codigoTela = rollos.codigoTela');
        $this->db->where('partidas.codigoPartida', $codigoPartida);
        $query = $this->db->get();
        return $query->result();
    }

}