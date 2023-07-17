<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lantai extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_lantai l');
        $this->db->join('tb_rak r', 'r.id_rak = l.id_rak');
        return $this->db->get()->result_array();
    }

    function get_max($tabel = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($tabel)->row_array()[$field];
    }

    function ambilId($id_lantai)
    {
        $this->db->select('*');
        $this->db->from('tb_lantai l');
        $this->db->join('tb_rak r', 'r.id_rak = l.id_rak');
        $this->db->where('l.id_lantai', $id_lantai);
        return $this->db->get();
    }

    function tambahData($kode_lantai)
    {
        $no_urut = $this->input->post('no_urut');
        $kapasitas = $this->input->post('kapasitas');
        $id_rak = $this->input->post('id_rak');
        $data = [
            'id_rak' => $id_rak,
            'kode_lantai' => $kode_lantai,
            'no_urut' => $no_urut,
            'kapasitas_lantai' => $kapasitas
        ];

        $this->db->insert('tb_lantai', $data);
    }

    function ubahData()
    {
        $id_lantai = $this->input->post('id_lantai_edit');
        $id_rak_edit = $this->input->post('id_rak_edit');
        $kapasitas_edit = $this->input->post('kapasitas_edit');
        $lantai_edit = $this->input->post('lantai_edit');
        $no_urut__edit = $this->input->post('no_urut__edit');

        $data = [
            'id_rak' => $id_rak_edit,
            'kode_lantai' => $lantai_edit,
            'no_urut' => $$no_urut__edit,
            'kapasitas_lantai' => $kapasitas_edit
        ];

        $this->db->where('id_lantai', $id_lantai);
        $this->db->update('tb_lantai', $data);
    }

    function hapusData()
    {
        $id_lantai = $this->input->post('id_lantai');
        $this->db->delete('tb_lantai', ['id_lantai' => $id_lantai]);
    }
}
