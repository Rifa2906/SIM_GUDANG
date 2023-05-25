<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{


    public function tampil()
    {
        return $this->db->get('tb_barang')->result_array();
    }

    function get_max($tabel = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($tabel)->row_array()[$field];
    }

    function ambilId($id_barang)
    {
        return $this->db->get_where('tb_barang', ['id_barang' => $id_barang]);
    }
}
