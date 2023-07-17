<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_keluar extends CI_Model
{

    function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_barang_keluar bk');
        $this->db->join('tb_barang brg', 'brg.id_barang = bk.id_barang');
        return $this->db->get()->result_array();
    }

    function tambah_data()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_store = $this->input->post('nama_store');
        $cabang = $this->input->post('cabang');
        $tanggal_keluar = $this->input->post('tanggal_keluar');

        $rak = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $id_rak = $rak['id_rak'];

        $jumlah = $this->input->post('jumlah');
        $this->cek_lantai($id_rak, $jumlah);
        $this->hapus_persediaan($id_barang, $jumlah);

        $data_persetujuan = [
            'id_barang' => $id_barang,
            'nama_store' => $nama_store,
            'cabang' => $cabang,
            'unit' => $jumlah,
            'status' => 'Meminta Persetujuan'
        ];
        $this->db->insert('tb_persetujuan', $data_persetujuan);


        $data = [
            'id_barang' => $id_barang,
            'nama_store' => $nama_store,
            'cabang' => $cabang,
            'jumlah' => $jumlah,
            'tanggal_keluar' => $tanggal_keluar,
            'status' => 'Belum Disetujui'
        ];

        $this->db->insert('tb_barang_keluar', $data);
    }

    public function cek_lantai($id_rak, $jumlah)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_lantai');
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by('no_urut', 'asc');
        $cek_stok_lantai = $this->db->get()->result_array();

        foreach ($cek_stok_lantai as $key => $value) {
            $cek_jumlah_kosong = $value['jumlah_kosong'];
            if ($cek_jumlah_kosong !== 0) {
                $id_lantai = $value['id_lantai'];
                $this->hapus_lantai($id_lantai, $jumlah);
                $this->cek_papan($id_lantai, $jumlah, $id_rak);
                break;
            } else {
            }
        }
    }



    function cek_papan($id_lantai, $jumlah)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_papan');
        $this->db->where('id_lantai', $id_lantai);
        $this->db->order_by('no_urut', 'asc');
        $cek_stok_papan = $this->db->get()->result_array();


        foreach ($cek_stok_papan as $key => $value) {
            $cek_jumlah_kosong = $value['jumlah_kosong'];
            if ($cek_jumlah_kosong !== 0) {
                $id_papan = $value['id_papan'];
                $this->hapus_papan($id_papan, $jumlah);
                break;
            }
        }
    }



    function hapus_persediaan($id_barang)
    {
        $this->db->delete('tb_persediaan', ['id_barang' => $id_barang]);
    }


    function hapus_papan($id_papan, $jumlah)
    {

        $stok_papan = $this->db->get_where('tb_stok_papan', ['id_papan' => $id_papan])->row_array();
        $jumlah_kosong = $stok_papan['jumlah_kosong'] + $jumlah;
        $total_jumlah = abs($stok_papan['jumlah_ada'] - $jumlah);
        $data = [
            'jumlah_ada' => $total_jumlah,
            'jumlah_kosong' => $jumlah_kosong
        ];
        $this->db->update('tb_stok_papan', $data, ['id_papan' => $id_papan]);
    }

    function hapus_lantai($id_lantai, $jumlah)
    {
        $stok_lantai = $this->db->get_where('tb_stok_lantai', ['id_lantai' => $id_lantai])->row_array();
        $jumlah_kosong = $stok_lantai['jumlah_kosong'] + $jumlah;
        $total_jumlah = abs($stok_lantai['jumlah_ada'] - $jumlah);
        $data = [
            'jumlah_ada' => $total_jumlah,
            'jumlah_kosong' => $jumlah_kosong
        ];
        $this->db->update('tb_stok_lantai', $data, ['id_lantai' => $id_lantai]);
    }
}
