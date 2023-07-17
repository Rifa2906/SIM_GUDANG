<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_stok_papan extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_stok_papan stp');
        $this->db->join('tb_lantai l', 'l.id_lantai = stp.id_lantai');
        $this->db->join('tb_papan p', 'p.id_papan = stp.id_papan');
        return $this->db->get()->result_array();
    }


    function kode_papan_otomatis($id_lantai)
    {
        $this->db->select('*');
        $this->db->from('tb_papan p');
        $this->db->join('tb_lantai l', 'l.id_lantai = p.id_lantai');
        $this->db->where('p.id_lantai', $id_lantai);
        return $this->db->get()->result_array();
    }



    function ambilId($id_stok_papan)
    {
        return $this->db->get_where('tb_stok_papan', ['id_stok_papan' => $id_stok_papan]);
    }

    function tambahData($id_papan)
    {
        $id_lantai = $this->input->post('id_lantai');
        $papan = $this->db->get_where('tb_papan', ['id_papan' => $id_papan])->row_array();

        $kapasitas = $papan['kapasitas_papan'];

        $no_urut = $papan['no_urut'];
        $jumlah_kosong = $kapasitas - 0;

        $data = [
            'id_lantai' => $id_lantai,
            'id_papan' => $id_papan,
            'no_urut' => $no_urut,
            'jumlah_ada' => 0,
            'jumlah_kosong' => $jumlah_kosong
        ];

        $this->db->insert('tb_stok_papan', $data);
    }



    function ubah_lantai($id_rak, $jumlah)
    {
        $lantai = $this->db->get_where('tb_lantai', ['id_rak' => $id_rak])->row_array();
        $id_lantai = $lantai['id_lantai'];
        $no_urut = $lantai['no_urut'];
        $jumlah_kosong = $lantai['kapasitas_lantai'] - $jumlah;

        $data_stok_lantai = [
            'id_rak' => $id_rak,
            'id_lantai' => $id_lantai,
            'jumlah_ada' => $jumlah,
            'jumlah_kosong' => $jumlah_kosong,
            'no_urut' => $no_urut
        ];

        $this->db->update('tb_stok_lantai', $data_stok_lantai, ['id_lantai' => $id_lantai]);
    }

    function hapusData()
    {
        $id_stok_papan = $this->input->post('id_stok_papan');
        $this->db->delete('tb_stok_papan', ['id_stok_papan' => $id_stok_papan]);
    }
}
