<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_barang extends CI_Controller {

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
		$data['title'] = "Daftar barang";
		$data['title1'] = "Form Tambah barang";
		$data['active'] = "daftar_barang";
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/daftar_barang', $data);
	}

	public function tambah_barang_form() {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_barang' => $this->input->post('nama_barang'),
			'merk' => $this->input->post('merk'),
			'harga' => $this->input->post('harga'),
			'satuan' => $this->input->post('satuan'),
			'masa_barang' => $this->input->post('masa_barang')
		);

		$this->m_barang->tambah_barang($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Ditambahkan!</div>');

		redirect('daftar_barang');
	}

	public function edit_barang($id_barang)
	{
		$data['title'] = "Form Edit Barang";
		$data['active'] = "daftar_barang";
		$data['barang'] = $this->m_barang->ambil_barang_byid($id_barang);
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/edit_barang', $data);
	}

	public function edit_barang_form($id_barang) {
		$data = array(
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_barang' => $this->input->post('nama_barang'),
			'merk' => $this->input->post('merk'),
			'harga' => $this->input->post('harga'),
			'satuan' => $this->input->post('satuan'),
			'masa_barang' => $this->input->post('masa_barang')
		);

		$this->m_barang->edit_barang($data, $id_barang);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Diedit!</div>');

		redirect('daftar_barang');
	}

	public function hapus_barang($id_barang)
	{
		$this->m_barang->hapus_barang($id_barang);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data barang Berhasil Dihapus!</div>');
		redirect('daftar_barang');
	}
}
