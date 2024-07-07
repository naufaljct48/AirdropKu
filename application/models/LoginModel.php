<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login($username, $password)
	{
		$this->db->select('ap.ID, ap.LOGIN, ap.PASSWORD, ap.NAMA, ap.NIP');
		$this->db->from('aplikasi.pengguna ap');
		$this->db->where('LOGIN', $username);
		$this->db->where('ap.STATUS', 1);
		$query = $this->db->get();

		$user = $query->row();

		// Jika user ditemukan, cek password
		if ($user) {
			$private_key = 'KDFLDMSTHBWWSGCBH';
			$passwordMD5 = md5($private_key . md5($password) . $private_key);
			if (hash_equals($user->PASSWORD, $passwordMD5)) {
				return $user;
			}
		}

		return null;
	}
}
