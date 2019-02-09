<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_inventaris');
		$this->load->model('m_barang');
		$this->load->model('m_pengguna');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Permintaan";
		$data['active'] = "daftar_permintaan";
		$data['daftar_permintaan'] = $this->m_inventaris->ambil_permintaan();
		// $data['daftar_permintaan'] = $this->m_inventaris->ambil_permintaan_bytoko($this->session->userdata('id_pengguna'));

		$this->compose_view('pegawai_ga/daftar_permintaan', $data);
	}

	public function proses_permintaan($id_permintaan)
	{
		$data['title'] = "Form Inventaris permintaan";
		$data['active'] = "daftar_permintaan";
		$data['permintaan'] = $this->m_inventaris->ambil_permintaan_byid($id_permintaan);
		$data['barang_permintaan'] = $this->m_inventaris->ambil_barang_permintaan($id_permintaan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_ga/proses_permintaan', $data);
	}

	public function proses_permintaan_form($id_permintaan) {
		$this->m_inventaris->edit_status_permintaan($id_permintaan);

		$data = array(
			'id_pengguna' => $this->input->post('id_pengguna'),
			'tanggal_inventaris' => date('Y-m-d'),
			'perihal' => $this->input->post('perihal'),
			'status_opname' => 'Belum Dilaksanakan'
		);
		$id_inventaris = $this->m_inventaris->tambah_inventaris($data);

		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas_toko') as $key2 => $kuantitas_toko) {
				if($key1 == $key2) {
					if($kuantitas_toko != '') {
						$data = array(
							'id_inventaris' => $id_inventaris,
							'id_barang' => $id_barang,
							'kuantitas_awal' => $kuantitas_toko,
							'kuantitas_toko' => $kuantitas_toko
						);
						$this->m_inventaris->tambah_barang_inventaris($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris permintaan Berhasil Diedit!</div>');

		redirect('permintaan');
	}

	public function tambah_permintaan()
	{
		$data['title'] = "Form Tambah Permintaan";
		$data['active'] = "daftar_permintaan";
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();

		$this->compose_view('pegawai_ga/tambah_permintaan', $data);
	}

	public function tambah_permintaan_form() {
		$data = array(
			'id_pengguna' => $this->input->post('id_pengguna'),
			'tanggal_permintaan' => date('Y-m-d'),
			'status_permintaan' => 'Belum Dikonfirmasi'
		);
		$id_permintaan = $this->m_inventaris->tambah_permintaan($data);

		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas') as $key2 => $kuantitas) {
				if($key1 == $key2) {
					if($kuantitas != '') {
						$data = array(
							'id_permintaan' => $id_permintaan,
							'id_barang' => $id_barang,
							'kuantitas' => $kuantitas
						);
						$this->m_inventaris->tambah_barang_permintaan($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data permintaan Berhasil Ditambahkan!</div>');

		redirect('permintaan');
	}

	public function edit_permintaan($id_permintaan)
	{
		$data['title'] = "Form Edit Permintaan";
		$data['active'] = "daftar_permintaan";
		$data['permintaan'] = $this->m_inventaris->ambil_permintaan_byid($id_permintaan);
		$data['barang_permintaan'] = $this->m_inventaris->ambil_barang_permintaan($id_permintaan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_ga/edit_permintaan', $data);
	}

	public function edit_permintaan_form($id_permintaan) {
		$data = array(
			'id_pengguna' => $this->input->post('id_pengguna')
		);
		$this->m_inventaris->edit_data_permintaan($data, $id_permintaan);

		$this->m_inventaris->hapus_barang_permintaan($id_permintaan);

		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas') as $key2 => $kuantitas) {
				if($key1 == $key2) {
					if($kuantitas != '') {
						$data = array(
							'id_permintaan' => $id_permintaan,
							'id_barang' => $id_barang,
							'kuantitas' => $kuantitas
						);
						$this->m_inventaris->tambah_barang_permintaan($data);
					}
				}
			}
		}
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data permintaan Berhasil Diedit!</div>');

		redirect('permintaan');
	}

	public function hapus_permintaan($id_permintaan, $foto_permintaan, $thumbnail_permintaan)
	{
		$this->m_inventaris->hapus_permintaan($id_permintaan);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data permintaan Berhasil Dihapus!</div>');

		redirect('permintaan');
	}

	public function detail_permintaan($id_permintaan)
	{
		$data['title'] = "Detail Permintaan";
		$data['active'] = "daftar_permintaan";
		$data['permintaan'] = $this->m_inventaris->ambil_permintaan_byid($id_permintaan);
		$data['barang_permintaan'] = $this->m_inventaris->ambil_barang_permintaan($id_permintaan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_ga/detail_permintaan', $data);
	}
}
