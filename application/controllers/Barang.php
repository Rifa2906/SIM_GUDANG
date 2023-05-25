<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang');
    }


    public function index()
    {
        $data['title'] = 'Barang';
        $data['kode_b'] = $this->kode_otomatis();
        $data['barang'] = $this->M_barang->tampil();
        $this->load->view('Template/header');
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Barang/index', $data);
        $this->load->view('Template/footer');
    }

    function kode_otomatis()
    {
        $tabel = "tb_barang";
        $field = "kode_barang";

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

        $nama_brand = $this->input->post('nama_brand');
        $kode_barang = $this->input->post('kode_barang');

        $data = [
            'kode_barang' => $kode_barang,
            'nama_brand' => $nama_brand,
        ];

        $this->db->insert('tb_barang', $data);
        $response['status'] = 1;
        echo json_encode($response);
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
        $id_barang = $this->input->post('id_barang_edit');
        $kode_barang_edit = $this->input->post('kode_barang_edit');
        $nama_brand_edit = $this->input->post('nama_brand_edit');

        $data = [
            'kode_barang' => $kode_barang_edit,
            'nama_brand' => $nama_brand_edit
        ];

        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang', $data);
        $response['status'] = 1;
        echo json_encode($response);
    }

    public function hapus()
    {
        $id_barang = $this->input->post('id_barang');
        $this->db->delete('tb_barang', ['id_barang' => $id_barang]);
        $response['status'] = 1;
        echo json_encode($response);
    }
}
