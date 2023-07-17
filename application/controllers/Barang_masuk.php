<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang_masuk');
        $this->load->model('M_lantai');
        $this->load->model('M_barang');
    }


    public function index()
    {
        $data['title'] = 'Barang Masuk';
        $data['bm'] = $this->M_barang_masuk->tampil();
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang_masuk/index', $data);
        $this->load->view('Template/footer');
    }

    function kode_lantai_otomatis()
    {
        $id_barang = $this->input->post('id_barang');
        $barang = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        $id_rak = $barang['id_rak'];
        $this->db->select('*');
        $this->db->from('tb_stok_lantai stl');
        $this->db->join('tb_rak r ', 'r.id_rak = stl.id_rak');
        $this->db->join('tb_lantai l ', 'l.id_lantai = stl.id_lantai');
        $this->db->where('stl.jumlah_kosong !=', 0);
        $this->db->where('stl.id_rak', $id_rak);
        $this->db->order_by('stl.no_urut', 'asc');
        $data = $this->db->get()->row_array();

        echo json_encode($data);
    }

    function kode_papan_otomatis()
    {
        $kode_lantai = $this->input->post('kode_lantai');
        $lantai = $this->db->get_where('tb_lantai', ['kode_lantai' => $kode_lantai])->row_array();
        $id_lantai = $lantai['id_lantai'];
        $papan = $this->db->get_where('tb_stok_papan', ['id_lantai' => $id_lantai])->row_array();

        $id_papan = $papan['id_papan'];
        $this->db->select('*');
        $this->db->from('tb_stok_papan stp');
        $this->db->join('tb_lantai l', 'l.id_lantai = stp.id_lantai');
        $this->db->join('tb_papan p', 'p.id_papan = stp.id_papan');
        $this->db->where('stp.jumlah_kosong !=', 0);
        $this->db->where('stp.id_papan', $id_papan);
        $this->db->order_by('stp.no_urut', 'asc');
        $data =  $this->db->get()->row_array();
        echo json_encode($data);
    }



    public function tambah()
    {
        $this->M_barang_masuk->tambah_data();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_barang_masuk->hapusData();
        $status = 1;
        echo json_encode($status);
    }

    public function cetak_pdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Barang';
        $this->data['barang_masuk'] = $this->M_barang_masuk->tampil();

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_barang_masuk';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('Barang_masuk/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function print()
    {
        $data['title_print'] = 'Laporan Barang Masuk';
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Barang/print', $data);
    }
}
