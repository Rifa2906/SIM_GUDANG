<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyimpanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
        $this->load->model('M_persediaan');
        $this->load->model('M_penyimpanan');
        $this->load->model('M_rak');
    }


    public function index()
    {
        $data['title'] = 'Penyimpanan';
        $data['rak'] = $this->M_rak->tampil();
        $data['persediaan'] = $this->M_persediaan->tampil();
        $data['penyimpanan'] = $this->M_penyimpanan->tampil();
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Penyimpanan/index', $data);
        $this->load->view('Template/footer');
    }

    public function jumlah_stok()
    {
        $id_persediaan = $this->input->post('id_persediaan');
        $persediaan = $this->db->get_where('tb_persediaan', ['id_persediaan' => $id_persediaan])->row_array();

        $response['jumlah_stok'] = $persediaan['stok'];

        echo json_encode($response);
    }

    public function tambah()
    {

        $id_rak = $this->input->post('id_rak');
        $id_persediaan = $this->input->post('id_persediaan');
        $jumlah_stok = $this->input->post('jumlah_stok');

        $persediaan = $this->db->get_where('tb_persediaan', ['id_persediaan' => $id_persediaan])->row_array();

        $rak =  $this->db->get_where('tb_rak', ['id_rak' => $id_rak])->row_array();

        $sisa = $rak['kapasitas'] - $jumlah_stok;

        $id_barang = $persediaan['id_barang'];

        $data = [
            'id_barang' => $id_barang,
            'id_rak' => $id_rak,
            'terisi' => $jumlah_stok,
            'sisa' => $sisa

        ];

        $this->db->insert('tb_penyimpanan', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }
}
