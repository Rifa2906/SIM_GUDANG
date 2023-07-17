<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lantai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lantai');
        $this->load->model('M_rak');
    }

    public function index()
    {
        $data['title'] = 'Lantai';
        $data['lantai'] = $this->M_lantai->tampil();
        $data['rak'] = $this->M_rak->tampil();
        $this->load->view('Template/header',$data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Lantai/index', $data);
        $this->load->view('Template/footer');
    }



    public function tambah()
    {

        $kode_lantai = $this->input->post('kode_lantai');
        $lantai = $this->M_lantai->tampil();

        if (!empty($lantai['kode_lantai'])) {
            foreach ($lantai as $key => $value) {
                if ($kode_lantai == $value['kode_lantai']) {
                    $status = 0;
                    break;
                } else {
                    $this->M_lantai->tambahData($kode_lantai);
                    $status = 1;
                    break;
                }
            }
        } else {
            $this->M_lantai->tambahData($kode_lantai);
            $status = 1;
        }


        echo json_encode($status);
    }

    public function ambil_IdLantai()
    {
        $id_lantai = $this->input->post('id_lantai');
        $lantai = $this->M_lantai->ambilId($id_lantai)->row_array();
        $data = [
            'id_lantai' => $lantai['id_lantai'],
            'id_rak' => $lantai['id_rak'],
            'kode_lantai' => $lantai['kode_lantai'],
            'no_urut' => $lantai['no_urut'],
            'kapasitas_lantai' => $lantai['kapasitas_lantai'],
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $this->M_lantai->ubahData();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_lantai->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
