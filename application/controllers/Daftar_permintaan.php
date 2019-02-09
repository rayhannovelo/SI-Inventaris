<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_permintaan extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(3);
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
		$data['title'] = "Daftar permintaan";
		$data['active'] = "daftar_permintaan";
		$data['daftar_permintaan'] = $this->m_inventaris->ambil_permintaan();

		$this->compose_view('pimpinan/daftar_permintaan', $data);
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

		$this->compose_view('pimpinan/proses_permintaan', $data);
	}

	public function proses_permintaan_form($id_permintaan) {
		$this->m_inventaris->edit_status_permintaan($id_permintaan);

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

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris permintaan Berhasil Diedit!</div>');

		redirect('daftar_permintaan');
	}

	public function tambah_permintaan()
	{
		$data['title'] = "Form Tambah permintaan";
		$data['active'] = "daftar_permintaan";
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();

		$this->compose_view('pimpinan/tambah_permintaan', $data);
	}

	public function tambah_permintaan_form() {
		$data = array(
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'tanggal_permintaan' => date('Y-m-d'),
			'status_permintaan' => 'Belum Dilaksanakan'
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

		redirect('daftar_permintaan');
	}

	public function edit_permintaan($id_permintaan)
	{
		$data['title'] = "Form Edit permintaan";
		$data['active'] = "daftar_permintaan";
		$data['permintaan'] = $this->m_inventaris->ambil_permintaan_byid($id_permintaan);
		$data['barang_permintaan'] = $this->m_inventaris->ambil_barang_permintaan($id_permintaan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pimpinan/edit_permintaan', $data);
	}

	public function edit_permintaan_form($id_permintaan) {
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

		redirect('daftar_permintaan');
	}

	public function hapus_permintaan($id_permintaan, $foto_permintaan, $thumbnail_permintaan)
	{
		$this->m_inventaris->hapus_permintaan($id_permintaan);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data permintaan Berhasil Dihapus!</div>');

		redirect('daftar_permintaan');
	}

	public function detail_permintaan($id_permintaan)
	{
		$data['title'] = "Detail permintaan";
		$data['active'] = "daftar_permintaan";
		$data['permintaan'] = $this->m_inventaris->ambil_permintaan_byid($id_permintaan);
		$data['barang_permintaan'] = $this->m_inventaris->ambil_barang_permintaan($id_permintaan);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pimpinan/detail_permintaan', $data);
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

	public function edit_kode_inventaris($kode_inventaris, $perihal) {
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
		
		return substr_replace($kode_inventaris, $jenis_inventaris, 7, 3);
	}
}
