<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_barang');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar Kategori Barang";
		$data['title1'] = "Form Tambah Kategori Barang";
		$data['active'] = "daftar_kategori";
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/daftar_kategori', $data);
	}

	public function tambah_kategori_form() {
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);

		$this->m_barang->tambah_kategori_barang($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Ditambahkan!</div>');

		redirect('daftar_kategori');
	}

	public function edit_kategori($id_kategori)
	{
		$data['title'] = "Form Edit Kategori Barang";
		$data['active'] = "daftar_kategori";
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang_byid($id_kategori);

		$this->compose_view('pegawai_asset/edit_kategori', $data);
	}

	public function edit_kategori_form($id_kategori) {
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);

		$this->m_barang->edit_kategori_barang($data, $id_kategori);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Diedit!</div>');

		redirect('daftar_kategori');
	}

	public function hapus_kategori($id_kategori)
	{
		$this->m_barang->hapus_kategori_barang($id_kategori);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Dihapus!</div>');
		redirect('daftar_kategori');
	}
}
