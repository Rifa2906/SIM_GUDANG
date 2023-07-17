<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_papan extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_papan p');
        $this->db->join('tb_lantai l', 'l.id_lantai = p.id_lantai');
        $this->db->join('tb_rak r', 'r.id_rak = p.id_rak');
        return $this->db->get()->result_array();
    }

    function kode_lantai($id_rak)
    {
        return $this->db->get_where('tb_lantai', ['id_rak' => $id_rak])->result_array();
    }

    function get_max($tabel = null, $field = null)
    {
        $this->db->select_max($field);
        return $this->db->get($tabel)->row_array()[$field];
    }

    function ambilId($id_papan)
    {
        $this->db->select('*');
        $this->db->from('tb_papan p');
        $this->db->join('tb_rak r', 'r.id_rak = p.id_rak');
        $this->db->join('tb_lantai l', 'l.id_lantai = p.id_lantai');
        $this->db->where('p.id_papan', $id_papan);
        return $this->db->get();
    }

    function tambahData($kode_papan)
    {
        $kapasitas = $this->input->post('kapasitas');
        $id_lantai = $this->input->post('id_lantai');
        $id_rak = $this->input->post('id_rak');
        $no_urut = $this->input->post('no_urut');
        $data = [
            'id_rak' => $id_rak,
            'id_lantai' => $id_lantai,
            'id_lantai' => $id_lantai,
            'kode_papan' => $kode_papan,
            'no_urut' => $no_urut,
            'kapasitas_papan' => $kapasitas
        ];

        $this->db->insert('tb_papan', $data);
    }

    function ubahData()
    {
        $id_papan = $this->input->post('id_papan_edit');
        $id_lantai_edit = $this->input->post('id_lantai_edit');
        $id_rak_edit = $this->input->post('id_rak_edit');
        $kapasitas_edit = $this->input->post('kapasitas_edit');
        $kode_papan_edit = $this->input->post('kode_papan_edit');
        $no_urut_edit = $this->input->post('no_urut_edit');
        $data = [
            'id_rak' => $id_rak_edit,
            'id_lantai' => $id_lantai_edit,
            'kode_papan' => $kode_papan_edit,
            'no_urut' => $no_urut_edit,
            'kapasitas_papan' => $kapasitas_edit
        ];

        $this->db->where('id_papan', $id_papan);
        $this->db->update('tb_papan', $data);
    }

    function hapusData()
    {
        $id_papan = $this->input->post('id_papan');
        $this->db->delete('tb_papan', ['id_papan' => $id_papan]);
    }
}
