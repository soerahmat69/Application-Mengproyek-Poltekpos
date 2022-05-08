<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek_K extends CI_Model
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



	function not()
	{
		return	$this->db->get('proyek')->result_array();
	}

	function PilihDospen($dos)
	{
		$this->db->where('level = 2 and nama =', $dos);
		$this->db->from('user');
		return $this->db->get()->result();
	}

	function DataProyek()
	{

		$this->db->from('proyek');
		$this->db->join('team', 'proyek.id_team = team.id_team');
		$this->db->join('user', 'proyek.nim_dospem = user.nim');
		return	$this->db->get()->result_array();
	}
	function dospem()
	{
		$this->db->where('accept_proyek is not null');
		$this->db->select('nim,nama,count(nim_dospem) as dospem');
		$this->db->group_by('nim_dospem');
		$this->db->from('proyek');
		$this->db->join('user', 'proyek.nim_dospem = user.nim');
		return	$this->db->get()->result_array();
	}
}
