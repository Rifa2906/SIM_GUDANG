<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penyimpanan extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->select_sum('terisi');
        $this->db->from('tb_barang brg');
        $this->db->join('tb_penyimpanan p', 'p.id_barang = brg.id_barang');
        $this->db->join('tb_rak r', 'r.id_rak = p.id_rak');
        $this->db->group_by('brg.nama_brand');
        return $this->db->get()->result_array();
    }

    function ambilId($id_penyimpanan)
    {
        return $this->db->get_where('tb_penyimpanan', ['id_penyimpanan' => $id_penyimpanan]);
    }
}
