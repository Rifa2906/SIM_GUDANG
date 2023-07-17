<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_persetujuan extends CI_Model
{


    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_barang brg');
        $this->db->join('tb_persetujuan p', 'p.id_barang = brg.id_barang');
        $this->db->group_by('brg.nama_brand');
        return $this->db->get()->result_array();
    }

    function setuju()
    {
        $id_persetujuan = $this->input->post('id_persetujuan');

        $persetujuan = $this->db->get_where('tb_persetujuan', ['id_persetujuan' => $id_persetujuan])->row_array();

        $jumlah = $persetujuan['jumlah'];

        $data_p = [
            'status' => 'Sudah Disetujui'
        ];

        $this->db->update('tb_persetujuan', $data_p, ['id_persetujuan' => $id_persetujuan]);


        $data_bk = [
            'status' => 'Sudah Disetujui'
        ];

        $this->db->update('tb_barang_keluar', $data_bk, ['jumlah' => $jumlah]);
    }

    function ditolak()
    {
        $id_persetujuan = $this->input->post('id_persetujuan');

        $persetujuan = $this->db->get_where('tb_persetujuan', ['id_persetujuan' => $id_persetujuan])->row_array();

        $jumlah = $persetujuan['jumlah'];

        $data_p = [
            'status' => 'Ditolak'
        ];

        $this->db->update('tb_persetujuan', $data_p, ['id_persetujuan' => $id_persetujuan]);


        $data_bk = [
            'status' => 'Ditolak'
        ];

        $this->db->update('tb_barang_keluar', $data_bk, ['jumlah' => $jumlah]);
    }
}
