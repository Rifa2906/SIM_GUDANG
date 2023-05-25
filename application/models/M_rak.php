<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_rak extends CI_Model
{


    public function tampil()
    {
        return $this->db->get('tb_rak')->result_array();
    }

    function ambilId($id_rak)
    {
        return $this->db->get_where('tb_rak', ['id_rak' => $id_rak]);
    }
}
