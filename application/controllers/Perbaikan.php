<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(1);
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
		$data['daftar_perbaikan'] = $this->m_inventaris->ambil_perbaikan();

		$this->compose_view('pegawai_asset/daftar_perbaikan', $data);
	}

	public function proses_perbaikan($id_perbaikan)
	{
		$data['title'] = "Form Inventaris Perbaikan";
		$data['active'] = "daftar_perbaikan";
		$data['perbaikan'] = $this->m_inventaris->ambil_perbaikan_byid($id_perbaikan);
		$data['barang_perbaikan'] = $this->m_inventaris->ambil_barang_perbaikan($id_perbaikan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/proses_perbaikan', $data);
	}

	public function proses_perbaikan_form($id_perbaikan) {
		$this->m_inventaris->edit_status_perbaikan($id_perbaikan);

		$kode_inventaris = $this->kode_inventaris($this->input->post('id_pengguna'), urlencode($this->input->post('perihal')));
		$data = array(
			'id_pengguna' => $this->input->post('id_pengguna'),
			'kode_inventaris' => $kode_inventaris,
			'tanggal_inventaris' => date('Y-m-d'),
			'perihal' => $this->input->post('perihal'),
			'status_opname' => 'Belum Dilaksanakan',
			'asal_toko' => $this->input->post('asal_toko') == '' ? NULL : $this->input->post('asal_toko')
		);
		$id_inventaris = $this->m_inventaris->tambah_inventaris($data);
		
		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas_toko') as $key2 => $kuantitas_toko) {
				if($key1 == $key2) {
					if($kuantitas_toko != '') {
						$data = array(
							'id_inventaris' => $id_inventaris,
							'id_barang' => $id_barang,
							'kode_barang' => $this->kode_barang($id_inventaris, $this->input->post('id_pengguna'), urlencode($this->input->post('perihal')), $this->input->post('id_kategori')[$key1], $kode_inventaris),
							'kuantitas_awal' => $kuantitas_toko,
							'kuantitas_toko' => $kuantitas_toko
						);
						$this->m_inventaris->tambah_barang_inventaris($data);
					}
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris perbaikan Berhasil Diedit!</div>');

		redirect('perbaikan');
	}

	public function hapus_perbaikan($id_perbaikan)
	{
		$this->m_inventaris->hapus_perbaikan($id_perbaikan);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data perbaikan Berhasil Dihapus!</div>');

		redirect('perbaikan');
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

		$this->compose_view('pegawai_asset/detail_perbaikan', $data);
	}

	public function kode_inventaris($id_pengguna, $perihal) {
		$kode_inventaris = 'INV'.str_pad($this->m_inventaris->ambil_id_inventaris_akhir() + 1, 3, "0", STR_PAD_LEFT);
		$kode_toko = 'T'.str_pad($id_pengguna, 3, "0", STR_PAD_LEFT);
		$tanggal_inventaris = str_replace('-', '', date('d-m-Y'));

		$perihal = urldecode($perihal);
		if($perihal == 'Persediaan Stok Barang') {
			$jenis_inventaris = 'PSB';
		}elseif($perihal == 'Permintaan Barang') {
			$jenis_inventaris = 'PMB';
		}elseif($perihal == 'Perbaikan Barang') {
			$jenis_inventaris = 'PRB';
		}elseif($perihal == 'Mutasi Barang') {
			$jenis_inventaris = 'MTB';
		}

		return $kode_inventaris.'/'.$jenis_inventaris.'/'.$kode_toko.'/'.$tanggal_inventaris;
	}

	public function kode_barang($id_inventaris, $id_pengguna, $perihal, $id_kategori, $kode_inventaris) {
		// kode inventaris
		$kode_inventaris = substr($kode_inventaris, 0, 6);

		// kode kategori
		$kode_kategori = 'K'.str_pad($id_kategori, 3, "0", STR_PAD_LEFT);

		// nomor barang
		$kode_barang_terakhir = $this->m_inventaris->ambil_kode_barang_kategori_akhir($id_kategori);
		$kuantitas_terakhir = $this->m_inventaris->ambil_kuantitas_kategori_akhir($id_kategori);
		$masa_barang_terakhir = $this->m_inventaris->ambil_masa_kategori_akhir($id_kategori);

		if($kode_barang_terakhir == FALSE) {
			$nomor_barang = '001';
		}else {
			if($masa_barang_terakhir < 5) {
				$nomor_barang = str_pad(substr($kode_barang_terakhir, 16, 3) + 1, 3, "0", STR_PAD_LEFT);
			}else {
				$nomor_barang = str_pad(substr($kode_barang_terakhir, 16, 3) + $kuantitas_terakhir, 3, "0", STR_PAD_LEFT);
			}
		}
		
		// kode toko
		$kode_toko = 'T'.str_pad($id_pengguna, 3, "0", STR_PAD_LEFT);

		// tanggal inventaris
		$tanggal_inventaris = str_replace('-', '', date('d-m-Y'));

		$perihal = urldecode($perihal);
		if($perihal == 'Persediaan Stok Barang') {
			$jenis_inventaris = 'PSB';
		}elseif($perihal == 'Permintaan Barang') {
			$jenis_inventaris = 'PMB';
		}elseif($perihal == 'Perbaikan Barang') {
			$jenis_inventaris = 'PRB';
		}elseif($perihal == 'Mutasi Barang') {
			$jenis_inventaris = 'MTB';
		}

		return $kode_inventaris.'/'.$jenis_inventaris.'/'.$kode_kategori.'/'.$nomor_barang.'/'.$kode_toko.'/'.$tanggal_inventaris;
	}
}
