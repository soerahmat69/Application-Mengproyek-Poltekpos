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

    function sidang()
    {

        $this->db->where('accept_proyek is not null and file_draft is not null');
        $this->db->join('user', 'proyek.nim_dospem = user.nim');
        $this->db->join('sidang', 'proyek.id_proyek = sidang.id_proyek');
        $proyek = $this->db->get('proyek')->result_array();

        foreach ($proyek as $lol) {

            $this->db->where('nim in(' . $lol['nim_dospeng'] . ')');
            $dospeng = $this->db->get('user')->result_array();
        }
        $this->db->where('level = 2');
        $user = $this->db->get('user')->result_array();

        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'user' => $user,
            'dospeng' => $dospeng

        ];

        $this->load->view('koor/layout/main', $data);
        $this->load->view('koor/manage_sidang');
        $this->load->view('koor/layout/footer');
    }

    function ajukan_dospeng()
    {
        $dospeng = $this->input->post('dospeng');
        $this->db->set('nim_dospeng', $dospeng);
        $this->db->where('id_proyek', $this->input->post('id_proyek'));
        $this->db->update('proyek');

        redirect(base_url('koor/proyek/sidang'));
    }

    function jadwal_sidang()
    {
        $data = [
            'jadwal' => $this->input->post('jadwal')
        ];
        $this->db->set('jadwal', $data);
        $this->db->where('id_proyek ', $this->input->post('id'));
        $this->db->update('sidang', $data);

        redirect(base_url('koor/proyek/sidang'));
    }



    function detail()
    {


        $id_proyek = $_GET['id_proyek'];

        $this->db->where('id_proyek in (' . $_GET['id_proyek'] . ')');
        $this->db->join('user', 'proyek.nim_dospem = user.nim');
        $this->db->join('team', 'proyek.id_team = team.id_team');
        $proyek = $this->db->get('proyek')->result_array();


        $this->db->where('id_proyek =' . $id_proyek);
        $this->db->join('user as janganlupasubrekygy', 'proyek.nim_dospeng = janganlupasubrekygy.nim');
        $dospeng = $this->db->get('proyek')->result_array();


        $this->db->where('id_proyek in (' . $id_proyek . ')');
        $bimbingan = $this->db->get('bimbingan')->result_array();



        $data = [
            'judul' => 'Detail Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'id_proyek' => $id_proyek,
            'bimbingan' => $bimbingan,
            'dospeng' => $dospeng

        ];


        if (empty($_GET['detail'])) {
            $this->load->view('koor/layout/main', $data);
            $this->load->view('koor/detail');
            $this->load->view('koor/layout/footer');
        } elseif (!empty($_GET['detail'] == 'team')) {
            $this->load->view('koor/layout/main', $data);
            $this->load->view('koor/detail');
            $this->load->view('koor/detail_team');
            $this->load->view('koor/layout/footer');
        } elseif (!empty($_GET['detail'] == 'sidang')) {
            $this->load->view('koor/layout/main', $data);
            $this->load->view('koor/detail');
            $this->load->view('koor/detail_sidang');
            $this->load->view('koor/layout/footer');
        } elseif (!empty($_GET['detail'] == 'bimbingan')) {
            $this->load->view('koor/layout/main', $data);
            $this->load->view('koor/detail');
            $this->load->view('koor/detail_bimbingan');
            $this->load->view('koor/layout/footer');
        }
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


    function ajukan_sidang()
    {


        $data = [
            'mulai_sidang' => $this->input->post('mulai'),
            'akhir_sidang' => $this->input->post('akhir'),
            'nim_user' => $this->input->post('nim')
        ];

        $this->db->insert('berita_acara', $data);

        redirect('koor/proyek/sidang');
    }
}
