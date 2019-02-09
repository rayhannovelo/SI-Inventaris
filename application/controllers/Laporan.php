<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct(){
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
        $data['title'] = "Laporan Inventaris";
        $data['active'] = "laporan_inventaris";
        $data['daftar_inventaris'] = $this->m_inventaris->ambil_inventaris();

        $this->compose_view('pimpinan/laporan_inventaris', $data);
    }

    public function laporan_opname()
    {
        $data['title'] = "Laporan Stok Opname";
        $data['active'] = "laporan_opname";
        $data['daftar_inventaris'] = $this->m_inventaris->ambil_inventaris_fix();

        $this->compose_view('pimpinan/laporan_opname', $data);
    }

    public function laporan_perbaikan()
    {
        $data['title'] = "Laporan Perbaikan";
        $data['active'] = "laporan_perbaikan";
        $data['daftar_perbaikan'] = $this->m_inventaris->ambil_perbaikan();

        $this->compose_view('pimpinan/laporan_perbaikan', $data);
    }

    public function laporan_mutasi()
    {
        $data['title'] = "Laporan Mutasi";
        $data['active'] = "laporan_mutasi";
        $data['daftar_mutasi'] = $this->m_inventaris->ambil_mutasi();

        $this->compose_view('pimpinan/laporan_mutasi', $data);
    }

    public function laporan_permintaan()
    {
        $data['title'] = "Laporan Permintaan";
        $data['active'] = "laporan_permintaan";
        $data['daftar_permintaan'] = $this->m_inventaris->ambil_permintaan();

        $this->compose_view('pimpinan/laporan_permintaan', $data);
    }

    public function invoice($id_inventaris) {
        $data['title'] = "Form Pembayaran";
        $data['active'] = "daftar_inventaris";
        $data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);

        $this->compose_view('pembeli/invoice', $data);
    }

    public function cetak_invoice($id_inventaris) {
        $data['title'] = "Invoice";
        $data['active'] = "daftar_inventaris";
        $data['inventaris'] = $this->m_inventaris->ambil_inventaris_byid($id_inventaris);

        $this->load->view('pembeli/cetak_invoice', $data);
    }
}
