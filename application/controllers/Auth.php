<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
		$this->load->database();
		$this->load->model('Auth_M');
		// $this->load->model('login_model');
	}

	public function index()
	{
		$title = ['judul' => 'Login'];
		$this->load->view('auth/login', $title);
	}

	public function login()
	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');

		$where = array(
			'nim' => $nim,
			'pass' => $password
		);


		$cek = $this->Auth_M->cek_login("user", $where)->num_rows();
		if ($cek > 0) {


			if ($this->Auth_M->user($nim)->num_rows() > 0)  //Ensure that there is at least one result 
			{
				foreach ($this->Auth_M->user($nim)->result_array() as $row) //Iterate through results
				{
					echo $row['level'];
					$data_session = array(
						'nama' => $row['nama'],
						'status' => "login",
						'nim' => $nim
					);
					$this->session->set_userdata($data_session);

					if ($row['level'] == 1) {
						redirect(base_url("mahasiswa/home"));
					} elseif ($row['level'] == 2) {
						redirect(base_url("dospem/home"));
					} elseif ($row['level'] == 3) {
						redirect(base_url("koor/home"));
					} elseif ($row['level'] == 4) {
						redirect(base_url("admin/home"));
					}
				}
			}
		} else {
			echo "Username dan password salah !";
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}
