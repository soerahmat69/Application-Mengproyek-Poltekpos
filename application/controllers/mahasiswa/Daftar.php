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
        $this->load->library('upload', 'config');


        $config = array(
            'upload_path' => './',
            'allowed_types' => 'pdf',
            'max_size' => 2048
        );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }


    public function index()
    {

        $nim = $this->session->userdata('nim');
        $anyone = $this->db->get('kegiatan')->result_array();

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
        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'dospen' => $this->Daftar_M->DataDospen(),
            'proyek' => $this->Daftar_M->ProyekSemua($nim),
            'anyone' => $anyone,
            'zewels' => $zewels


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

        //mod
        if (!$this->upload->do_upload('proposal')) {
            redirect(base_url('mahasiswa/daftar'));
        } else {
            $file_raw = file_get_contents($this->upload->data('full_path'));
            //mod
            $data = [

                'nim_dospem' => $dospem,
                'id_team' => $curi[0]->id_team,
                'proyek' => $this->input->post('proyek'),
                'judul' => $this->input->post('judul_proyek'),
                'abstraksi' => $this->input->post('abstraksi'),
                'file_proposal' => $file_raw


            ];

            unlink($file_raw);
            $this->db->insert('proyek', $data);
            redirect(base_url('/mahasiswa/daftar'));
        }
    }

    function bimbingan()
    {


        $id_proyek = $_GET['id_proyek'];

        $this->db->where('id_proyek in (' . $_GET['id_proyek'] . ')');
        $proyek = $this->db->get('bimbingan')->result_array();

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

        $data = [
            'judul' => 'Daftar Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'id_proyek' => $id_proyek,
            'zewels' => $zewels

        ];

        $this->load->view('mahasiswa/layout/main', $data);
        $this->load->view('mahasiswa/bimbingan');
        $this->load->view('mahasiswa/layout/footer');
    }

    function bimpan()
    {


        $config['upload_path'] = './';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $get_image = $this->input->post(file_get_contents($_FILES['file_proposal']['file_bimbingan']));  //imgProfile is the name of the image tag  

        $data = [
            'kegiatan' => $this->input->post('kegiatan'),
            'id_proyek' => $this->input->post('id_proyek'),
            'file_bimbingan' => $get_image
        ];

        $this->db->insert('bimbingan', $data);

        return redirect(base_url('mahasiswa/daftar'));
    }
}
