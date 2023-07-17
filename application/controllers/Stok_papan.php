<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_papan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_stok_papan');
        $this->load->model('M_rak');
        $this->load->model('M_lantai');
        $this->load->model('M_papan');
        $this->load->model('M_barang');
    }


    public function index()
    {
        $data['title'] = 'Stok Penyimpanan Papan';
        $data['stok_p'] = $this->M_stok_papan->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $data['lantai'] = $this->M_lantai->tampil();
        $data['papan'] = $this->M_papan->tampil();
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Stok_papan/index', $data);
        $this->load->view('Template/footer');
    }


    public function kode_papan_otomatis()
    {
        $id_lantai = $this->input->post('id_lantai');
        $data_papan = $this->M_stok_papan->kode_papan_otomatis($id_lantai);
        echo json_encode($data_papan);
    }

    public function tambah_data()
    {
        $id_papan = $this->input->post('id_papan');
        $stok_p = $this->M_stok_papan->tampil();
        if (!empty($stok_p)) {
            foreach ($stok_p as $key => $value) {
                if ($id_papan == $value['id_papan']) {
                    $status = 0;
                    break;
                } else {
                    $this->M_stok_papan->tambahData($id_papan);
                    $status = 1;
                    break;
                }
            }
        } else {
            $this->M_stok_papan->tambahData($id_papan);
            $status = 1;
        }


        echo json_encode($status);
    }

    public function ambil_IdStok()
    {
        $id_stok_papan = $this->input->post('ID_stok_papan');
        $stok = $this->M_stok_papan->ambilId($id_stok_papan)->row_array();
        $data = [
            'id_stok_papan' => $stok['id_stok_papan'],
            'id_papan' => $stok['id_papan'],
            'id_lantai' => $stok['id_lantai'],
        ];
        echo json_encode($data);
    }

    // public function ubah_data()
    // {
    //     $this->M_stok_papan->ubahData();
    //     $status = 1;
    //     echo json_encode($status);
    // }



    public function hapus()
    {
        $this->M_stok_papan->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
