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
		$title = [
			'judul' => 'Home',
			'nama' => $this->session->userdata('nim')
		];

		$this->load->view('admin/layout/main', $title);
		$this->load->view('admin/home');
		$this->load->view('admin/layout/footer');
	}
}
