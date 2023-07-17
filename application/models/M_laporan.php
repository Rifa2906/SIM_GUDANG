<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{


    public function tampil_laporan_masuk()
    {
        $this->db->select('*');
        $this->db->from('tb_laporan_masuk lm');
        $this->db->join('tb_barang b', 'b.id_barang = lm.id_barang');
        return $this->db->get()->result_array();
    }

    public function tampil_laporan_keluar()
    {
        $this->db->select('*');
        $this->db->from('tb_laporan_keluar lk');
        $this->db->join('tb_barang b', 'b.id_barang = lk.id_barang');
        return $this->db->get()->result_array();
    }
}
