<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
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
        $this->session->userdata('nama');
        $this->load->model('Proyek_K');
    }


    public function index()
    {

        $nim = $this->session->userdata('nim');


        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $this->Proyek_K->DataProyek()


        ];

        $this->load->view('koor/layout/main', $data);
        $this->load->view('koor/manage_proyek');
        $this->load->view('koor/layout/footer');
    }

    function pembimbing()
    {


        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $this->Proyek_K->dospem()

        ];

        $this->load->view('koor/layout/main', $data);
        $this->load->view('koor/manage_pembimbing');
        $this->load->view('koor/layout/footer');
    }

    function detail()
    {


        $id_proyek = $_GET['id_proyek'];

        $this->db->where('id_proyek in (' . $_GET['id_proyek'] . ')');
        $proyek = $this->db->get('proyek')->result_array();

        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,

        ];

        $this->load->view('koor/layout/main', $data);
        $this->load->view('koor/detail');
        $this->load->view('koor/layout/footer');
    }

    function proposaldate()
    {


        $data = [
            'mulai_proposal' => $this->input->post('mulai'),
            'akhir_proposal' => $this->input->post('akhir'),
            'nim_user' => $this->input->post('nim')
        ];

        $this->db->insert('berita_acara', $data);

        return redirect(base_url('koor/proyek'));
    }
}
