<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model{

    // pengguna

    public function tambah_pengguna($data) {
        $this->db->insert('pengguna', $data);
        return $this->db->insert_id();
    }

    public function edit_pengguna($id_pengguna, $data) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);
    }

    public function hapus_pengguna($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->delete('pengguna');
    }   

    public function ambil_pengguna() {
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_toko() {
        $this->db->where('level', 4);
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_registrasi_baru() {
        $this->db->select('pengguna.id_pengguna, id_pembeli, username, tanggal_daftar');
        $this->db->join('pembeli', 'pembeli.id_pengguna = pengguna.id_pengguna');
        $this->db->where('pengguna.status', 0);
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_pengguna_byid() {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_password($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('pengguna')->row()->password;
    }

    public function terima_pembeli($id_pengguna) {
        $this->db->set('status', 1);
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);
    }

    public function tolak_pembeli($id_pengguna) {
        $this->db->set('status', 2);
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);
    }

    // pembeli

    public function ambil_pembeli_byid($id_pembeli) {
        $this->db->join('pengguna', 'pengguna.id_pengguna = pembeli.id_pengguna');
        $this->db->join('alamat_pembeli', 'alamat_pembeli.id_pembeli = pembeli.id_pembeli');
        $this->db->where('pembeli.id_pembeli', $id_pembeli);
        $this->db->limit(1);
        return $this->db->get('pembeli')->result_array();
    }

    public function ambil_pembeli_aktif() {
        $this->db->join('pembeli', 'pembeli.id_pengguna = pengguna.id_pengguna');
        $this->db->join('alamat_pembeli', 'alamat_pembeli.id_pembeli = pembeli.id_pembeli');
        $this->db->where('pengguna.status', 1);
        $this->db->limit(1);
        return $this->db->get('pengguna')->result_array();
    }

    public function ambil_pembeli_tidak_valid() {
        $this->db->join('pembeli', 'pembeli.id_pengguna = pengguna.id_pengguna');
        $this->db->join('alamat_pembeli', 'alamat_pembeli.id_pembeli = pembeli.id_pembeli');
        $this->db->where('pengguna.status', 2);
        $this->db->limit(1);
        return $this->db->get('pengguna')->result_array();
    }

    public function tambah_pembeli($data) {
        $config['upload_path'] = "./assets/img/ktp/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|img|psd|tiff|wmf';
        $config['max_width'] = "5000";
        $config['max_height'] = "5000";

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("foto_ktp")) 
        {
            $upload = $this->upload->data();
            $data['foto_ktp'] = $upload['file_name'];

            // create thumbnail
            $config['image_library'] = 'gd2';
            $config['source_image'] = $config['upload_path'] . $upload['file_name'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 280;
            $config['height']       = 210;
        }

        $data = array(
            'id_pengguna' => $data['id_pengguna'],
            'no_ktp' => $data['no_ktp'],
            'foto_ktp' => $data['foto_ktp'],
            'nama_pembeli' => $data['nama_pembeli'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'agama' => $data['agama'],
            'status_rumah' => $data['status_rumah'],
            'email' => $data['email'],
            'facebook' =>  $data['facebook'],
            'twitter' => $data['twitter'],
            'instagram' => $data['instagram'],
            'youtube' => $data['youtube'],
            'hobi' => $data['hobi'],
            'pekerjaan' => $data['pekerjaan'],
            'pengeluaran' => $data['pengeluaran'],
            'pendidikan_terakhir' => $data['pendidikan_terakhir'],
            'no_hp' => $data['no_hp'],
            'no_telepon' => $data['no_telepon'],
            'status_hp' => $data['status_hp'],
            'status_informasi' => $data['status_informasi'],
            'merk_motor' => $data['merk_motor'],
            'jenis_motor' => $data['jenis_motor']
        );

        $this->db->insert('pembeli', $data);
        return $this->db->insert_id();
    }

    public function edit_pembeli($id_pembeli, $data) {
        $this->db->where('id_pembeli', $id_pembeli);
        $this->db->update('pembeli', $data);
    }

    public function hapus_pembeli($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->delete('pengguna');
    }

    // alamat pembeli

    public function ambil_alamat() {
        return $this->db->get('alamat_pembeli')->result_array();
    }

    public function ambil_alamat_byid($id_pembeli) {
        $this->db->where('id_pembeli', $id_pembeli);
        return $this->db->get('alamat_pembeli')->result_array();
    }

    public function ambil_alamat_byid_alamat($id_alamat) {
        $this->db->where('id_alamat', $id_alamat);
        return $this->db->get('alamat_pembeli')->result_array();
    }

    public function tambah_alamat($data) {
        $this->db->insert('alamat_pembeli', $data);
    }

    public function edit_alamat($id_alamat, $data) {
        $this->db->where('id_alamat', $id_alamat);
        $this->db->update('alamat_pembeli', $data);
    }

    public function hapus_alamat($id_alamat) {
        $this->db->where('id_alamat', $id_alamat);
        $this->db->delete('alamat_pembeli');
    }
}