<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('Template/Login/header_login', $data);
            $this->load->view('Login/index');
            $this->load->view('Template/Login/footer_login');
        } else {

            $this->aksi_login();
        }
    }

    public function aksi_login()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_pengguna', ['email' => $email])->row_array();


        if ($user) {

            //cek pass
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'email' => $user['email'],
                    'id' => $user['id']
                ];

                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password salah
               </div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Email belum terdaftar
          </div>');
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Anda berhasil logout
          </div>');
        redirect('Login');
    }
}
