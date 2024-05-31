<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laps_model extends CI_Model
{
    public function getLapById($codigoLapdik)
    {
        return $this->db->get_where('laps', ['codigoLapdik' => $codigoLapdik])->row();
    }
}