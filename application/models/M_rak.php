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

    function tambahData($kode_rak)
    {
        $kapasitas = $this->input->post('kapasitas');
        $data = [
            'kode_rak' => $kode_rak,
            'kapasitas' => $kapasitas
        ];

        $this->db->insert('tb_rak', $data);
    }

    function ubahData()
    {
        $id_rak = $this->input->post('id_rak_edit');
        $kode_rak_edit = $this->input->post('kode_rak_edit');
        $kapasitas_edit = $this->input->post('kapasitas_edit');

        $data = [
            'kode_rak' => $kode_rak_edit,
            'kapasitas' => $kapasitas_edit
        ];

        $this->db->where('id_rak', $id_rak);
        $this->db->update('tb_rak', $data);
    }

    function hapusData()
    {
        $id_rak = $this->input->post('id_rak');
        $this->db->delete('tb_rak', ['id_rak' => $id_rak]);
    }
}
