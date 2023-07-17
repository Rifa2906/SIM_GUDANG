<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_barang b');
        $this->db->join('tb_rak r', 'r.id_rak = b.id_rak');
        return $this->db->get()->result_array();
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

    function tambahData()
    {
        $nama_brand = $this->input->post('nama_brand');
        $kode_barang = $this->input->post('kode_barang');
        $id_rak = $this->input->post('id_rak');

        $data = [
            'id_rak' => $id_rak,
            'kode_barang' => $kode_barang,
            'nama_brand' => $nama_brand,
            'unit' => 0,
        ];

        $this->db->insert('tb_barang', $data);
    }

    function ubahData()
    {
        $id_barang = $this->input->post('id_barang_edit');
        $kode_barang_edit = $this->input->post('kode_barang_edit');
        $nama_brand_edit = $this->input->post('nama_brand_edit');

        $data = [
            'kode_barang' => $kode_barang_edit,
            'nama_brand' => $nama_brand_edit
        ];

        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang', $data);
    }

    function hapusData()
    {
        $id_barang = $this->input->post('id_barang');
        $this->db->delete('tb_barang', ['id_barang' => $id_barang]);
    }
}
