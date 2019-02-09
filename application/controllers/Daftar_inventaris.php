<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_inventaris extends CI_Controller {

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
		$data['title'] = "Daftar inventaris";
		$data['active'] = "daftar_inventaris";
		$data['daftar_inventaris'] = $this->m_inventaris->ambil_inventaris();

		$this->compose_view('pegawai_asset/daftar_inventaris', $data);
	}

	public function tambah_inventaris()
	{
		$data['title'] = "Form Tambah inventaris";
		$data['active'] = "daftar_inventaris";
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();

		$this->compose_view('pegawai_asset/tambah_inventaris', $data);
	}

	public function tambah_inventaris_form() {
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

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris Berhasil Ditambahkan!</div>');

		redirect('daftar_inventaris');
	}

	public function edit_inventaris($id_inventaris)
	{
		$data['title'] = "Form Edit inventaris";
		$data['active'] = "daftar_inventaris";
		$data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);
		$data['barang_inventaris'] = $this->m_inventaris->ambil_barang_inventaris($id_inventaris);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/edit_inventaris', $data);
	}

	public function edit_inventaris_form($id_inventaris) {
		$kode_inventaris = $this->edit_kode_inventaris($this->input->post('kode_inventaris'), urlencode($this->input->post('perihal')));
		$data = array(
			'id_pengguna' => $this->input->post('id_pengguna'),
			'kode_inventaris' => $kode_inventaris,
			'perihal' => $this->input->post('perihal'),
			'asal_toko' => $this->input->post('asal_toko') == '' ? NULL : $this->input->post('asal_toko')
		);
		$this->m_inventaris->edit_data_inventaris($data, $id_inventaris);

		$this->m_inventaris->hapus_barang_inventaris($id_inventaris);

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
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris Berhasil Diedit!</div>');

		redirect('daftar_inventaris');
	}

	public function hapus_inventaris($id_inventaris, $foto_inventaris, $thumbnail_inventaris)
	{
		$this->m_inventaris->hapus_inventaris($id_inventaris);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data inventaris Berhasil Dihapus!</div>');

		redirect('daftar_inventaris');
	}

	public function detail_inventaris($id_inventaris)
	{
		$data['title'] = "Detail inventaris";
		$data['active'] = "daftar_inventaris";
		$data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);
		$data['barang_inventaris'] = $this->m_inventaris->ambil_barang_inventaris($id_inventaris);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_asset/detail_inventaris', $data);
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

	public function print_kode($kode_barang) {
		echo str_replace('-', '/', $kode_barang);
		echo '<script>window.print();history.back();</script>';
	}
}
