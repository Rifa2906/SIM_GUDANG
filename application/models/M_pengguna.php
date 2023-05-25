<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{


    public function tampil()
    {
        return $this->db->get('tb_pengguna')->result_array();
    }

    function ambilId($id)
    {
        return $this->db->get_where('tb_pengguna', ['id' => $id]);
    }
}
