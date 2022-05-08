<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_M extends CI_Model
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



	function DataDospen()
	{
		$this->db->where('level in (2)');
		$this->db->from('user');
		return $this->db->get()->result_array();
	}

	function PilihDospen($dos)
	{
		$this->db->where('level = 2 and nama =', $dos);
		$this->db->from('user');
		return $this->db->get()->result();
	}

	function ProyekSemua($nim)
	{

		$this->db->where('accept in (1) and (nim_mhs in(' . $nim . ') OR partnert in (' . $nim . '))');
		$this->db->from('team');
		$curi = $this->db->get()->result();

		if (!isset($curi[0]->id_team)) {
		} else {
			$this->db->where(' id_team = ' . $curi[0]->id_team . '');
			return $this->db->get('proyek')->result_array();
		}
	}
}
