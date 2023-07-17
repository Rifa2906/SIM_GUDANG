<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_masuk extends CI_Model
{

    function tampil()
    {
        $this->db->select('*');
        $this->db->from('tb_barang_masuk bm');
        $this->db->join('tb_barang brg', 'brg.id_barang = bm.id_barang');
        $this->db->join('tb_rak r', 'r.id_rak = bm.id_rak');
        $this->db->join('tb_lantai l', 'l.id_lantai = bm.id_lantai');
        $this->db->join('tb_papan p', 'p.id_papan = bm.id_papan');
        return $this->db->get()->result_array();
    }

    function tambah_data()
    {
        $id_barang = $this->input->post('id_barang');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_kadaluarsa = $this->input->post('tanggal_kadaluarsa');
        $kode_lantai = $this->input->post('kode_lantai');
        $kode_papan = $this->input->post('kode_papan');

        $lantai = $this->db->get_where('tb_lantai', ['kode_lantai' => $kode_lantai])->row_array();
        $id_lantai = $lantai['id_lantai'];
        $kode_lantai = $lantai['kode_lantai'];

        $brg = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $id_rak = $brg['id_rak'];

        $rak = $this->db->get_where('tb_rak', ['id_rak' => $id_rak])->row_array();
        $kode_rak = $rak['kode_rak'];



        $papan = $this->db->get_where('tb_papan', ['kode_papan' => $kode_papan])->row_array();
        $id_papan = $papan['id_papan'];



        $jumlah = $this->input->post('jumlah');
        $this->cek_lantai($id_rak, $jumlah);
        $this->tambah_persediaan($id_barang, $jumlah, $kode_rak, $kode_lantai, $tanggal_masuk, $tanggal_kadaluarsa);

        $this->tambah_unit_produk($id_barang, $jumlah);
        $data = [
            'id_barang' => $id_barang,
            'id_rak' => $id_rak,
            'id_papan' => $id_papan,
            'id_lantai' => $id_lantai,
            'jumlah' => $jumlah,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_kadaluarsa' => $tanggal_kadaluarsa
        ];

        $this->db->insert('tb_barang_masuk', $data);
        $this->tambah_laporan_masuk($id_barang, $jumlah, $tanggal_masuk);
    }

    function tambah_unit_produk($id_barang, $jumlah)
    {

        $produk = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $jml_produk = $produk['unit'];
        $unit = $jml_produk + $jumlah;
        $data = [
            'unit_produk' => $unit,
        ];

        $this->db->update('tb_barang', $data, ['id_barang' => $id_barang]);
    }

    function tambah_laporan_masuk($id_barang, $jumlah, $tanggal_masuk)
    {
        $data = [
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal_masuk
        ];
        $this->db->insert('tb_laporan_masuk', $data);
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
                $this->update_lantai($id_lantai, $jumlah);
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
            $jumlah_kosong = $value['jumlah_kosong'];
            if ($jumlah_kosong !== 0) {
                if ($jumlah > $jumlah_kosong) {
                    $id_papan = $value['id_papan'];
                    $id_lantai = $value['id_lantai'];
                    $selisih = $jumlah - $jumlah_kosong;
                    $this->update_papan_selisih($id_papan, $jumlah_kosong);
                    $this->cek_papan_selisih($id_lantai, $selisih);
                    break;
                } else {
                    $id_papan = $value['id_papan'];
                    $this->update_papan($id_papan, $jumlah);
                    break;
                }
            }
        }
    }

    function cek_papan_selisih($id_lantai, $selisih)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_papan');
        $this->db->where('id_lantai', $id_lantai);
        $this->db->order_by('no_urut', 'asc');
        $cek_stok_papan = $this->db->get()->result_array();

        foreach ($cek_stok_papan as $key => $value) {
            $cek_jumlah_kosong = $value['jumlah_kosong'];
            if ($cek_jumlah_kosong > 0) {
                $id_papan = $value['id_papan'];
                $this->update_papan($id_papan, $selisih);
                break;
            }
        }
    }

    function tambah_persediaan($id_barang, $jumlah, $kode_rak, $kode_lantai, $tanggal_masuk, $tanggal_kadaluarsa)
    {
        $barang = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $kode_produk = $barang['kode_produk'];
        $data_p = [
            'id_barang' => $id_barang,
            'kode_produk' => $kode_produk,
            'tanggal_masuk' => $tanggal_masuk,
            'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
            'rak' => $kode_rak,
            'lantai' => $kode_lantai,
            'jumlah' => $jumlah
        ];

        $this->db->insert('tb_persediaan', $data_p);
    }

    function update_papan_selisih($id_papan, $cek_jumlah_kosong)
    {
        $jumlah_kosong = 0;
        $stok_papan = $this->db->get_where('tb_stok_papan', ['id_papan' => $id_papan])->row_array();
        $total_jumlah = $cek_jumlah_kosong + $stok_papan['jumlah_ada'];
        $data = [
            'jumlah_ada' => $total_jumlah,
            'jumlah_kosong' => $jumlah_kosong
        ];
        $this->db->update('tb_stok_papan', $data, ['id_papan' => $id_papan]);
    }

    function update_papan($id_papan, $jumlah)
    {

        $stok_papan = $this->db->get_where('tb_stok_papan', ['id_papan' => $id_papan])->row_array();
        $jumlah_kosong = $stok_papan['jumlah_kosong'] - $jumlah;
        $total_jumlah = $jumlah + $stok_papan['jumlah_ada'];
        $data = [
            'jumlah_ada' => $total_jumlah,
            'jumlah_kosong' => $jumlah_kosong
        ];
        $this->db->update('tb_stok_papan', $data, ['id_papan' => $id_papan]);
    }

    function update_lantai($id_lantai, $jumlah)
    {
        $lantai = $this->db->get_where('tb_lantai', ['id_lantai' => $id_lantai])->row_array();

        $stok_lantai = $this->db->get_where('tb_stok_lantai', ['id_lantai' => $id_lantai])->row_array();
        $jumlah_kosong = $stok_lantai['jumlah_kosong'] - $jumlah;
        $total_jumlah = $jumlah + $stok_lantai['jumlah_ada'];
        $data = [
            'jumlah_ada' => $total_jumlah,
            'jumlah_kosong' => $jumlah_kosong
        ];
        $this->db->update('tb_stok_lantai', $data, ['id_lantai' => $id_lantai]);
    }

    function hapusData()
    {
        $id_masuk = $this->input->post('id_masuk');
        $brg_masuk = $this->db->get_where('tb_barang_masuk', ['id_masuk' => $id_masuk])->row_array();
        $id_barang = $brg_masuk['id_barang'];
        $barang = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $id_rak = $barang['id_rak'];

        $lantai = $this->db->get_where('tb_lantai', ['id_rak' => $id_rak])->row_array();
        $id_lantai = $lantai['id_lantai'];

        $jumlah_dihapus = $brg_masuk['jumlah'];
        $this->hapus_stok_lantai($id_rak, $jumlah_dihapus);
        $this->hapus_stok_papan($id_lantai, $jumlah_dihapus);




        $this->db->delete('tb_barang_masuk', ['id_masuk' => $id_masuk]);
    }

    function hapus_stok_lantai($id_rak, $jumlah_dihapus)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_lantai');
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by('no_urut', 'asc');
        $cek_stok_lantai = $this->db->get()->result_array();

        foreach ($cek_stok_lantai as $key => $value) {
            $total_jumlah_ada = abs($value['jumlah_ada'] - $jumlah_dihapus);
            $total_jumlah_kosong = $value['jumlah_kosong'] + $jumlah_dihapus;
            $id_lantai = $value['id_lantai'];
            $data = [
                'jumlah_ada' => $total_jumlah_ada,
                'jumlah_kosong' => $total_jumlah_kosong
            ];
            $this->db->update('tb_stok_lantai', $data, ['id_lantai' => $id_lantai]);
            break;
        }
    }

    function hapus_stok_papan($id_lantai, $jumlah_dihapus)
    {
        $this->db->select('*');
        $this->db->from('tb_stok_papan');
        $this->db->where('id_lantai', $id_lantai);
        $this->db->order_by('no_urut', 'asc');
        $cek_stok_papan = $this->db->get()->result_array();

        foreach ($cek_stok_papan as $key => $value) {

            if ($value['jumlah_kosong'] > 0) {
                $total_jumlah_ada = abs($value['jumlah_ada'] - $jumlah_dihapus);
                $total_jumlah_kosong = $value['jumlah_kosong'] + $jumlah_dihapus;
                $id_papan = $value['id_papan'];
                $data = [
                    'jumlah_ada' => $total_jumlah_ada,
                    'jumlah_kosong' => $total_jumlah_kosong
                ];
                $this->db->update('tb_stok_papan', $data, ['id_papan' => $id_papan]);
                break;
            }
        }
    }
}
