<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
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
        $this->load->model('Daftar_M');
    }


    public function index()
    {

        $nim = $this->session->userdata('nim');

        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'dospen' => $this->Daftar_M->DataDospen(),
            'proyek' => $this->Daftar_M->ProyekSemua($nim)


        ];

        $this->load->view('mahasiswa/layout/main', $data);
        $this->load->view('mahasiswa/daftar');
        $this->load->view('mahasiswa/layout/footer');
    }

    function simpan()
    {

        $dos = $this->Daftar_M->PilihDospen($this->input->post('dospem'));
        $dospem = $dos[0]->nim;

        $nims = $this->input->post('nim_mhs');

        $this->db->where('accept = 1 and nim_mhs = ' . $nims . '');
        $this->db->from('team');
        $curi = $this->db->get()->result();


        if (isset($curi[0]->id_team)) {

            $data = [

                'nim_dospem' => $dospem,
                'id_team' => $curi[0]->id_team,
                'proyek' => $this->input->post('proyek'),
                'judul' => $this->input->post('judul_proyek'),
                'abstraksi' => $this->input->post('abstraksi'),
                'file_proposal' => $this->input->post('proposal')

            ];

            $this->db->insert('proyek', $data);

            return redirect(base_url('mahasiswa/daftar'));
        } else {
            echo "wahhh kentangnya ketinggalanmnn";
        }
    }

    function bimbingan()
    {


        $id_proyek = $_GET['id_proyek'];

        $this->db->where('id_proyek in (' . $_GET['id_proyek'] . ')');
        $proyek = $this->db->get('bimbingan')->result_array();

        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'id_proyek' => $id_proyek

        ];

        $this->load->view('mahasiswa/layout/main', $data);
        $this->load->view('mahasiswa/bimbingan');
        $this->load->view('mahasiswa/layout/footer');
    }

    function bimpan()
    {


        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'id_proyek' => $this->input->post('id_proyek'),
            'file_bimbingan' => $this->input->post('file_laporan')
        ];

        $this->db->insert('bimbingan', $data);

        return redirect(base_url('mahasiswa/daftar'));
    }
}
