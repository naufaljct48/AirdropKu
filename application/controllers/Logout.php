<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function index()
	{
		// unset($_SESSION);
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */