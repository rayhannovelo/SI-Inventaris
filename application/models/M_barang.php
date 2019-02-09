<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model{

    // barang

    public function ambil_barang() {
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = daftar_barang.id_kategori');
        return $this->db->get('daftar_barang')->result_array();
    }

    public function ambil_barang_byid($id_barang) {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('daftar_barang')->result_array();
    }

    public function tambah_barang($data) {
        $this->db->insert('daftar_barang', $data);
    }

    public function edit_barang($data, $id_barang) {
        $this->db->where('id_barang', $id_barang);
        $this->db->update('daftar_barang', $data);
    }

    public function hapus_barang($id_barang) {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('daftar_barang');
        return $this->db->affected_rows();
    }

    // kategori barang

    public function ambil_kategori_barang() {
        return $this->db->get('kategori_barang')->result_array();
    }

    public function ambil_kategori_barang_byid($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get('kategori_barang')->result_array();
    }

    public function tambah_kategori_barang($data) {
        $this->db->insert('kategori_barang', $data);
    }

    public function edit_kategori_barang($data, $id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori_barang', $data);
    }

    public function hapus_kategori_barang($id_kategori) {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori_barang');
    }
}