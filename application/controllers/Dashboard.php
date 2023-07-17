<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$data['jml_data'] = [
			'user' => $this->db->get('tb_pengguna')->num_rows(),
			'brg_masuk' => $this->db->get('tb_barang_masuk')->num_rows(),
			'brg_keluar' => $this->db->get('tb_barang_keluar')->num_rows()
		];

		$data['title'] = "Dashboard";
		$this->load->view('Template/header', $data);
		$this->load->view('Template/topbar');
		$this->load->view('Template/sidebar');
		$this->load->view('Dashboard/index', $data);
		$this->load->view('Template/footer', $data);
	}
}
