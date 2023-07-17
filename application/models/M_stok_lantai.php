<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stok_lantai extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_stok_lantai stl');
        $this->db->join('tb_rak r ', 'r.id_rak = stl.id_rak');
        $this->db->join('tb_lantai l ', 'l.id_lantai = stl.id_lantai');
        return $this->db->get()->result_array();
    }

    function kode_lantai_otomatis($id_rak)
    {
        $this->db->select('*');
        $this->db->from('tb_lantai l');
        $this->db->join('tb_rak r', 'r.id_rak = l.id_rak');
        $this->db->where('l.id_rak', $id_rak);
        return $this->db->get()->result_array();
    }


    function tambahData($id_lantai)
    {
        $id_rak = $this->input->post('ID_rak');
        $data_lantai = $this->db->get_where('tb_lantai', ['id_lantai' => $id_lantai])->row_array();
        $kapasitas = $data_lantai['kapasitas_lantai'];
        $no_urut = $data_lantai['no_urut'];
        $jumlah_kosong = $kapasitas - 0;

        $data = [
            'id_rak' => $id_rak,
            'id_lantai' => $id_lantai,
            'jumlah_ada' => 0,
            'jumlah_kosong' => $jumlah_kosong,
            'no_urut' => $no_urut,
        ];

        $this->db->insert('tb_stok_lantai', $data);
    }

    function hapusData()
    {
        $id_stok_lantai = $this->input->post('id_stok_lantai');
        $this->db->delete('tb_stok_lantai', ['id_stok_lantai' => $id_stok_lantai]);
    }
}
