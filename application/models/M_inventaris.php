<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventaris extends CI_Model{

    public function ambil_id_inventaris_akhir() {
        return $this->db->select('id_inventaris')->order_by('id_inventaris','desc')->limit(1)->get('inventaris')->row('id_inventaris');
    }

    public function ambil_id_barang_inventaris_akhir() {
        return $this->db->select('id_barang_inventaris')->order_by('id_barang_inventaris','desc')->limit(1)->get('barang_inventaris')->row('id_barang_inventaris');
    }

    public function ambil_kode_barang_inventaris_akhir() {
        return $this->db->select('kode_barang')->order_by('id_barang_inventaris','desc')->limit(1)->get('barang_inventaris')->row('kode_barang');
    }

    public function ambil_kode_barang_kategori_akhir($id_kategori) {
        $this->db->select('daftar_barang.id_barang, kode_barang');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_inventaris.id_barang');
        $this->db->order_by('id_barang_inventaris','desc');
        $this->db->limit(1);
        $this->db->where('id_kategori', $id_kategori);
        $nilai = $this->db->get('barang_inventaris')->row('kode_barang');

        if($nilai == FALSE) {
            return FALSE;
        }else {
            return $nilai;
        }
    }

    public function ambil_kuantitas_kategori_akhir($id_kategori) {
        $this->db->select('daftar_barang.id_barang, kuantitas_awal');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_inventaris.id_barang');
        $this->db->order_by('id_barang_inventaris','desc');
        $this->db->limit(1);
        $this->db->where('id_kategori', $id_kategori);
        $nilai = $this->db->get('barang_inventaris')->row('kuantitas_awal');
        
        if($nilai == FALSE) {
            return 1;
        }else {
            return $nilai;
        }
    }

    public function ambil_masa_kategori_akhir($id_kategori) {
        $this->db->select('daftar_barang.id_barang, kode_barang, masa_barang');
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_inventaris.id_barang');
        $this->db->order_by('id_barang_inventaris','desc');
        $this->db->limit(1);
        $this->db->where('id_kategori', $id_kategori);
        $nilai = $this->db->get('barang_inventaris')->row('masa_barang');

        if($nilai == FALSE) {
            return 1;
        }else {
            return $nilai;
        }
    }

    public function ambil_inventaris() {
        return $this->db->query('SELECT *, (SELECT `nama_pengguna` FROM `pengguna` WHERE `pengguna`.`id_pengguna` = `inventaris`.`asal_toko`) AS `asal` FROM `inventaris` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `inventaris`.`id_pengguna`')->result_array();
    }

    public function ambil_inventaris_fix() {
        return $this->db->query('SELECT *, (SELECT `nama_pengguna` FROM `pengguna` WHERE `pengguna`.`id_pengguna` = `inventaris`.`asal_toko`) AS `asal` FROM `inventaris` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `inventaris`.`id_pengguna` WHERE `status_opname` = "Sudah Dilaksanakan" AND `perihal` = "Persediaan Stok Barang" ')->result_array();
    }

    public function ambil_inventarisss() {
        $this->db->join('pengguna', 'pengguna.id_pengguna = inventaris.id_pengguna');
        $this->db->join('pengguna', 'pengguna.id_pengguna = inventaris.asal_toko');
        return $this->db->get('inventaris')->result_array();
    }

    public function ambil_inventaris_byid($id_inventaris) {
        return $this->db->query('SELECT *, (SELECT `nama_pengguna` FROM `pengguna` WHERE `pengguna`.`id_pengguna` = `inventaris`.`asal_toko`) AS `asal` FROM `inventaris` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `inventaris`.`id_pengguna` WHERE `id_inventaris` = '.$id_inventaris)->result_array();

        // $this->db->where('id_inventaris', $id_inventaris);
        // return $this->db->get('inventaris')->result_array();
    }

    public function ambil_inventaris_byidpengguna($id_pengguna) {
        return $this->db->query('SELECT *, (SELECT `nama_pengguna` FROM `pengguna` WHERE `pengguna`.`id_pengguna` = `inventaris`.`asal_toko`) AS `asal` FROM `inventaris` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `inventaris`.`id_pengguna` WHERE `pengguna`.`id_pengguna` = '.$id_pengguna)->result_array();

        // $this->db->where('id_inventaris', $id_inventaris);
        // return $this->db->get('inventaris')->result_array();
    }

    public function tambah_inventaris($data) {
        $this->db->insert('inventaris', $data);
        return $this->db->insert_id();
    }

    public function edit_inventaris($id_inventaris) {
        $this->db->set('status_opname', 'Sudah Dilaksanakan');
        $this->db->where('id_inventaris', $id_inventaris);
        $this->db->update('inventaris');
    }

    public function edit_data_inventaris($data, $id_inventaris) {
        $this->db->where('id_inventaris', $id_inventaris);
        $this->db->update('inventaris', $data);
    }

    public function hapus_inventaris($id_inventaris) {
        $this->db->where('id_inventaris', $id_inventaris);
        $this->db->delete('inventaris');
    } 

    // barang inventaris

    public function ambil_barang_inventaris($id_inventaris) {
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_inventaris.id_barang');
        $this->db->where('id_inventaris', $id_inventaris);
        return $this->db->get('barang_inventaris')->result_array();
    } 

    public function ambil_kode_barang_byid($id_barang_inventaris) {
        $this->db->where('id_barang_inventaris', $id_barang_inventaris);
        return $this->db->get('barang_inventaris')->row('kode_barang');
    }   

    public function tambah_barang_inventaris($data) {
        $this->db->insert('barang_inventaris', $data);
    } 

    public function hapus_barang_inventaris($id_inventaris) {
        $this->db->where('id_inventaris', $id_inventaris);
        $this->db->delete('barang_inventaris');
    } 

    // perbaikan

    public function ambil_perbaikan() {
        $this->db->join('pengguna', 'pengguna.id_pengguna = perbaikan_barang.id_pengguna');
        return $this->db->get('perbaikan_barang')->result_array();
    }

    public function ambil_perbaikan_bytoko($id_pengguna) {
        $this->db->join('pengguna', 'pengguna.id_pengguna = perbaikan_barang.id_pengguna');
        $this->db->where('perbaikan_barang.id_pengguna', $id_pengguna);
        return $this->db->get('perbaikan_barang')->result_array();
    }

    public function ambil_perbaikan_byid($id_perbaikan) {
        $this->db->where('id_perbaikan', $id_perbaikan);
        return $this->db->get('perbaikan_barang')->result_array();
    }

    public function tambah_perbaikan($data) {
        $this->db->insert('perbaikan_barang', $data);
        return $this->db->insert_id();
    }

    public function edit_perbaikan($id_perbaikan) {
        $this->db->set('status_opname', 'Sudah Dilaksanakan');
        $this->db->where('id_perbaikan', $id_perbaikan);
        $this->db->update('perbaikan_barang');
    }

    public function edit_status_perbaikan($id_perbaikan) {
        $this->db->set('status_perbaikan', 'Sudah Dilaksanakan');
        $this->db->where('id_perbaikan', $id_perbaikan);
        $this->db->update('perbaikan_barang');
    }

    public function hapus_perbaikan($id_perbaikan) {
        $this->db->where('id_perbaikan', $id_perbaikan);
        $this->db->delete('perbaikan_barang');
    } 

    // barang perbaikan

    public function ambil_barang_perbaikan($id_perbaikan) {
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_perbaikan.id_barang');
        $this->db->where('id_perbaikan', $id_perbaikan);
        return $this->db->get('barang_perbaikan')->result_array();
    }  

    public function tambah_barang_perbaikan($data) {
        $this->db->insert('barang_perbaikan', $data);
    } 

    public function hapus_barang_perbaikan($id_perbaikan) {
        $this->db->where('id_perbaikan', $id_perbaikan);
        $this->db->delete('barang_perbaikan');
    } 

    // permintaan

    public function ambil_permintaan() {
        $this->db->join('pengguna', 'pengguna.id_pengguna = permintaan_barang.id_pengguna');
        return $this->db->get('permintaan_barang')->result_array();
    }

    public function ambil_permintaan_bytoko($id_pengguna) {
        $this->db->join('pengguna', 'pengguna.id_pengguna = permintaan_barang.id_pengguna');
        $this->db->where('permintaan_barang.id_pengguna', $id_pengguna);
        return $this->db->get('permintaan_barang')->result_array();
    }

    public function ambil_permintaan_byid($id_permintaan) {
        $this->db->where('id_permintaan', $id_permintaan);
        return $this->db->get('permintaan_barang')->result_array();
    }

    public function tambah_permintaan($data) {
        $this->db->insert('permintaan_barang', $data);
        return $this->db->insert_id();
    }

    public function edit_data_permintaan($data, $id_permintaan) {
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->update('permintaan_barang', $data);
    }

    public function edit_permintaan($id_permintaan) {
        $this->db->set('status_opname', 'Sudah Dilaksanakan');
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->update('permintaan_barang');
    }

    public function edit_status_permintaan($id_permintaan) {
        $this->db->set('status_permintaan', 'Sudah Dilaksanakan');
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->update('permintaan_barang');
    }

    public function hapus_permintaan($id_permintaan) {
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->delete('permintaan_barang');
    }

    // barang permintaan

    public function ambil_barang_permintaan($id_permintaan) {
        $this->db->join('daftar_barang', 'daftar_barang.id_barang = barang_permintaan.id_barang');
        $this->db->where('id_permintaan', $id_permintaan);
        return $this->db->get('barang_permintaan')->result_array();
    }  

    public function tambah_barang_permintaan($data) {
        $this->db->insert('barang_permintaan', $data);
    } 

    public function hapus_barang_permintaan($id_permintaan) {
        $this->db->where('id_permintaan', $id_permintaan);
        $this->db->delete('barang_permintaan');
    } 

    // mutasi

    public function ambil_mutasi() {
        return $this->db->query('SELECT *, (SELECT `nama_pengguna` FROM `pengguna` WHERE `pengguna`.`id_pengguna` = `inventaris`.`asal_toko`) AS `asal` FROM `inventaris` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `inventaris`.`id_pengguna` WHERE `perihal` = "Mutasi Barang"')->result_array();
    }
}