<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_M extends CI_Model
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */



	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function user($nim)
	{
		$this->db->where('nim', $nim);
		$this->db->from('user');
		return $this->db->get();
	}
}
