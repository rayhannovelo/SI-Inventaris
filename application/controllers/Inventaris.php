<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris extends CI_Controller {

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
		$data['title'] = "Daftar Inventaris";
		$data['active'] = "daftar_inventaris";
		$data['daftar_inventaris'] = $this->m_inventaris->ambil_inventaris_byidpengguna($this->session->userdata('id_pengguna'));

		$this->compose_view('pegawai_toko/daftar_inventaris', $data);
	}

	public function stok_opname($id_inventaris)
	{
		$data['title'] = "Form Stok Opname";
		$data['active'] = "daftar_inventaris";
		$data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);
		$data['barang_inventaris'] = $this->m_inventaris->ambil_barang_inventaris($id_inventaris);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_toko/stok_opname', $data);
	}

	public function edit_inventaris($id_inventaris)
	{
		$data['title'] = "Form Edit Stok Opname";
		$data['active'] = "daftar_inventaris";
		$data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);
		$data['barang_inventaris'] = $this->m_inventaris->ambil_barang_inventaris($id_inventaris);
		$data['daftar_toko'] = $this->m_pengguna->ambil_toko();
		$data['daftar_barang'] = $this->m_barang->ambil_barang();
		$data['kategori_barang'] = $this->m_barang->ambil_kategori_barang();

		$this->compose_view('pegawai_toko/edit_stok_opname', $data);
	}

	public function stok_opname_form($id_inventaris) {
		$this->m_inventaris->edit_inventaris($id_inventaris);
		$this->m_inventaris->hapus_barang_inventaris($id_inventaris);

		foreach ($this->input->post('id_barang') as $key => $id_barang) {
			$data = array(
				'id_inventaris' => $id_inventaris,
				'id_barang' => $id_barang,
				'kode_barang' => $this->input->post('kode_barang')[$key],
				'kuantitas_awal' => $this->input->post('kuantitas_awal')[$key],
				'kuantitas_toko' => ($this->input->post('kuantitas_awal')[$key] - $this->input->post('status_rusak')[$key]) < 0 ? 0 : ($this->input->post('kuantitas_awal')[$key] - $this->input->post('status_rusak')[$key]),
				'kuantitas_pengawas' => $this->input->post('kuantitas_pengawas')[$key],
				'status_baik' => $this->input->post('status_baik')[$key],
				'status_rusak' => $this->input->post('status_rusak')[$key],
				'keterangan' => $this->input->post('keterangan')[$key],
			);
			$this->m_inventaris->tambah_barang_inventaris($data);			
		}

		/*
		'kuantitas_toko' => ($this->input->post('kuantitas_awal')[$key] - $this->input->post('status_rusak')[$key]) < 0 ? 0 : ($$this->input->post('kuantitas_awal')[$key] - $this->input->post('status_rusak')[$key]),
		*/
		/*
		foreach ($this->input->post('id_barang') as $key1 => $id_barang) {
			foreach ($this->input->post('kuantitas_toko') as $key2 => $kuantitas_toko) {
				foreach ($this->input->post('kuantitas_pengawas') as $key3 => $kuantitas_pengawas) {
					foreach ($this->input->post('status_baik') as $key4 => $status_baik) {
						foreach ($this->input->post('status_rusak') as $key5 => $status_rusak) {
							foreach ($this->input->post('keterangan') as $key6 => $keterangan) {
								foreach ($this->input->post('kuantitas_awal') as $key7 => $kuantitas_awal) {
									if($key1 == $key2 && $key2 == $key3 && $key3 == $key4 && $key4 == $key5 && $key5 == $key6 && $key6 == $key7) {
										$data = array(
											'id_inventaris' => $id_inventaris,
											'id_barang' => $id_barang,
											'kuantitas_awal' => $kuantitas_awal,
											'kuantitas_toko' => ($kuantitas_awal - $status_rusak) < 0 ? 0 : ($kuantitas_awal - $status_rusak),
											'kuantitas_pengawas' => $kuantitas_pengawas,
											'status_baik' => $status_baik,
											'status_rusak' => $status_rusak,
											'keterangan' => $keterangan,
										);
										$this->m_inventaris->tambah_barang_inventaris($data);
										break 6;
									}
								}
							}
						}
					}
				}
			}
		}
		*/
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Stok Opaname berhasil dilakukan!</div>');

		redirect('inventaris');
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
}
