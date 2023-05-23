<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


	public function index()
	{
		$data['jml_data'] = [
			'user' => $this->db->get('tb_pengguna')->num_rows()
		];
		$this->load->view('Template/header');
		$this->load->view('Template/topbar');
		$this->load->view('Template/sidebar');
		$this->load->view('Dashboard/index', $data);
		$this->load->view('Template/footer', $data);
	}
}
