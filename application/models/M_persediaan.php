<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_persediaan extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->select_sum('stok');
        $this->db->from('tb_barang brg');
        $this->db->join('tb_persediaan p', 'p.id_barang = brg.id_barang');
        $this->db->group_by('brg.nama_brand');
        return $this->db->get()->result_array();
    }

    function ambilId($id_persediaan)
    {
        return $this->db->get_where('tb_persediaan', ['id_persediaan' => $id_persediaan]);
    }
}
