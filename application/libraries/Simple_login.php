<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	/* 
		Level User :
		1. Pegawai Fix Asset
		2. Pegawai General Affair
		3. Pimpinan
		4. Pegawai Toko
	*/

	// Set Super Global
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($username,$password,$level) {
		$query = $this->CI->db->get_where('pengguna', array('username'=>$username,'password' => md5($password)));
		if($query->num_rows() == 1) {
			$pengguna 	= $this->CI->db->query('SELECT * FROM pengguna WHERE username = "'.$username.'"')->row();
			$this->CI->session->set_userdata('id_pengguna', $pengguna->id_pengguna);
			$this->CI->session->set_userdata('username', $pengguna->username);
			$this->CI->session->set_userdata('level', $pengguna->level);
			$this->CI->session->set_userdata('nama_pengguna', $pengguna->nama_pengguna);
			$this->CI->session->set_userdata('login', 'login');
			if($pengguna->level == 1) {
				redirect('daftar_inventaris');
			}elseif($pengguna->level == 2) {
				redirect('permintaan');
			}elseif($pengguna->level == 3) {
				redirect('daftar_permintaan');
			}elseif($pengguna->level == 4) {
				redirect('inventaris');
			}
		}else{                
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center">Maaf username/password yang Anda masukkan salah!</div>');
			redirect('login');
		}
	}

	// Proteksi halaman
	public function cek_login($level) {
		if($this->CI->session->userdata('level') != $level) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	public function login_super($level1,$level2) {
		if($this->CI->session->userdata('level') != $level1 && $this->CI->session->userdata('level') != $level2){
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center" align="center">Anda Belum Log In!</div>');
			redirect('login');
		}else{
			return $this->CI->session->userdata('level');
		}
	}

	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_pengguna');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('nama_pengguna');
		$this->CI->session->unset_userdata('login');
		$this->CI->session->set_flashdata('sukses','<div class="alert alert-success text-center">Anda Berhasil Log Out!</div>');
		redirect('login');
	}
}