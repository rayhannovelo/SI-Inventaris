<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_perbaikan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(4);
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
		$data['title'] = "Daftar Perbaikan";
		$data['active'] = "daftar_perbaikan";
		$data['daftar_perbaikan'] = $this->m_inventaris->ambil_perbaikan_bytoko($this->session->userdata('id_pengguna'));

		$this->compose_view('pegawai_toko/daftar_perbaikan', $data);
	}

	public function tambah_perbaikan()
	{
		$data['title'] = "Form Tambah Perbaikan";
		$data['active'] = "daftar_perbaikan";
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();

		$this->compose_view('pegawai_toko/tambah_perbaikan', $data);
	}

	public function tambah_perbaikan_form() {
		$data = array(
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'tanggal_perbaikan' => date('Y-m-d'),
			'status_perbaikan' => 'Belum Dilaksanakan'
		);
		$id_perbaikan = $this->m_inventaris->tambah_perbaikan($data);

		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas') as $key2 => $kuantitas) {
				if($key1 == $key2) {
					if($kuantitas != '') {
						$data = array(
							'id_perbaikan' => $id_perbaikan,
							'id_barang' => $id_barang,
							'kuantitas' => $kuantitas
						);
						$this->m_inventaris->tambah_barang_perbaikan($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data perbaikan Berhasil Ditambahkan!</div>');

		redirect('daftar_perbaikan');
	}

	public function edit_perbaikan($id_perbaikan)
	{
		$data['title'] = "Form Edit Perbaikan";
		$data['active'] = "daftar_perbaikan";
		$data['perbaikan'] = $this->m_inventaris->ambil_perbaikan_byid($id_perbaikan);
		$data['barang_perbaikan'] = $this->m_inventaris->ambil_barang_perbaikan($id_perbaikan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_toko/edit_perbaikan', $data);
	}

	public function edit_perbaikan_form($id_perbaikan) {
		$this->m_inventaris->hapus_barang_perbaikan($id_perbaikan);

		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas') as $key2 => $kuantitas) {
				if($key1 == $key2) {
					if($kuantitas != '') {
						$data = array(
							'id_perbaikan' => $id_perbaikan,
							'id_barang' => $id_barang,
							'kuantitas' => $kuantitas
						);
						$this->m_inventaris->tambah_barang_perbaikan($data);
					}
				}
			}
		}
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data perbaikan Berhasil Diedit!</div>');

		redirect('daftar_perbaikan');
	}

	public function hapus_perbaikan($id_perbaikan, $foto_perbaikan, $thumbnail_perbaikan)
	{
		$this->m_inventaris->hapus_perbaikan($id_perbaikan);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data perbaikan Berhasil Dihapus!</div>');

		redirect('daftar_perbaikan');
	}

	public function detail_perbaikan($id_perbaikan)
	{
		$data['title'] = "Detail perbaikan";
		$data['active'] = "daftar_perbaikan";
		$data['perbaikan'] = $this->m_inventaris->ambil_perbaikan_byid($id_perbaikan);
		$data['barang_perbaikan'] = $this->m_inventaris->ambil_barang_perbaikan($id_perbaikan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_toko/detail_perbaikan', $data);
	}
}
