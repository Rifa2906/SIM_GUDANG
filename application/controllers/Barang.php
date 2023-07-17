<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_rak');
    }


    public function index()
    {
        $data['title'] = 'Produk';
        $data['kode_b'] = $this->kode_otomatis();
        $data['barang'] = $this->M_barang->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang/index', $data);
        $this->load->view('Template/footer');
    }

    function kode_otomatis()
    {
        $tabel = "tb_barang";
        $field = "kode_produk";

        $lastkode = $this->M_barang->get_max($tabel, $field);
        //mengambil 4 karakter dari belakang
        $noUrut = (int) substr($lastkode, -4, 4);
        $noUrut++;
        $str = "T";
        $newKode = $str . sprintf('%04s', $noUrut);
        return $newKode;
    }

    public function tambah()
    {



        $this->M_barang->tambahData();
        $status = 1;
        echo json_encode($status);
    }

    public function ambil_IdBarang()
    {
        $id_barang = $this->input->post('id_barang');
        $barang = $this->M_barang->ambilId($id_barang)->row_array();
        $data = [
            'id_barang' => $barang['id_barang'],
            'kode_barang' => $barang['kode_barang'],
            'nama_brand' => $barang['nama_brand'],
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $this->M_barang->ubahData();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_barang->hapusData();
        $status = 1;
        echo json_encode($status);
    }



    public function cetak_pdf()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Barang';
        $this->data['barang'] = $this->M_barang->tampil();

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_barang';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('Barang/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function print()
    {
        $data['title_print'] = 'Laporan Barang';
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Barang/print', $data);
    }
}
