<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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



	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");

		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}


	public function index()
	{
		$this->db->where('level = 4');
		$this->db->join('user', 'berita_acara.nim_user = user.nim');
		$nanggal = $this->db->get('berita_acara')->result_array();

		foreach ($nanggal as $lol) {

			$start = date('d/m/Y');
			$end = date('d/m/Y', strtotime($lol['akhir_proposal']));

			if ($end > $start) {
				$zewels = 'proposal: <span class=" badge badge-pill badge-success">Sedang Berlangsung</span>';
			} else {
				$zewels = 'proposal: <span class="badge badge-pill badge-danger">Tidak Berlangsung</span>';
			}
		}
		$title = [
			'judul' => 'Dashboard',
			'nama' => $this->session->userdata('nama'),
			'zewels' => $zewels
		];

		$this->load->view('mahasiswa/layout/main', $title);
		$this->load->view('mahasiswa/home');
		$this->load->view('mahasiswa/layout/footer');
	}
}
