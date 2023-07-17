<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_pengguna');
    }


    public function index()
    {
        $data['title'] = 'Pengguna';
        $data['pengguna'] = $this->M_pengguna->tampil();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Pengguna/index', $data);
        $this->load->view('Template/footer');
    }

    public function Profile($id)
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('tb_pengguna', ['id' => $id])->row_array();
        $this->load->view('Template/header', $data);
        $this->load->view('Template/topbar');
        $this->load->view('Template/sidebar');
        $this->load->view('Pengguna/profile', $data);
        $this->load->view('Template/footer');
    }

    public function tambah()
    {
        $this->M_pengguna->tambah_data();
        $status = 1;
        echo json_encode($status);
    }

    public function ambil_IdPengguna()
    {
        $id = $this->input->post('id');
        $pengguna = $this->M_pengguna->ambilId($id)->row_array();
        $data = [
            'id' => $pengguna['id'],
            'nama' => $pengguna['nama'],
            'alamat' => $pengguna['alamat'],
            'no_telpon' => $pengguna['no_telpon'],
            'email' => $pengguna['email'],
            'role' => $pengguna['role']
        ];
        echo json_encode($data);
    }

    public function ubah_data()
    {
        $this->M_pengguna->ubahData();
        $status = 1;
        echo json_encode($status);
    }

    public function hapus()
    {
        $this->M_pengguna->hapusData();
        $status = 1;
        echo json_encode($status);
    }

    function ubah_password()
    {
        $this->M_pengguna->hapusData();
        $status = 1;
        echo json_encode($status);
    }
}
