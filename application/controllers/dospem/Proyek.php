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
        // $this->load->model('Team_M');
    }


    public function index()
    {

        $nim = $this->session->userdata('nim');

        $where = "accept_proyek is null and nim_dospem in (" . $nim . ")";
        $this->db->where($where);
        $this->db->from('proyek');
        $rekrut =  $this->db->get()->result_array();


        $wheres = "accept_proyek is not null and nim_dospem in (" . $nim . ")";
        $this->db->where($wheres);
        $this->db->from('proyek');
        $proyek = $this->db->get()->result_array();




        $title = [
            'judul' => 'Bergabung Team',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'rekrut' => $rekrut

        ];

        $this->load->view('dospem/layout/main', $title);
        $this->load->view('dospem/proyek', $title);
        $this->load->view('dospem/layout/footer');
    }

    function rekrut()
    {

        $nim = $this->input->post('partnert');
        $nama = $this->input->post('nama');
        $nimm = $this->input->post('nim');


        $data = [
            'nim_mhs' => $nimm,
            'nama_mhs' => $nama,
            'partnert' => $nim,


        ];

        $this->db->insert('team', $data);

        return redirect(base_url('mahasiswa/proyek'));
    }

    function terima()
    {
        $acc = $this->input->post('accept');
        $nim = $this->session->userdata('nim');
        $id_proyek = $this->input->post('id_proyek');

        if (isset($nim)) {

            $this->db->where('id_proyek =', $id_proyek);
            $this->db->set('accept_proyek', $acc);
            $this->db->update('proyek');

            return redirect(base_url('dospem/proyek'));
        } else {
            echo "salah";
        }
    }

    function bimbingan()
    {
        $id_proyek = $_GET['id_proyek'];

        $this->db->where('id_proyek in(' . $id_proyek . ')');
        $bimbingan = $this->db->get('bimbingan')->result_array();

        $title = [
            'judul' => 'Bimbingan Proyek',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'bimbingan' => $bimbingan

        ];

        $this->load->view('dospem/layout/main', $title);
        $this->load->view('dospem/bimbingan', $title);
        $this->load->view('dospem/layout/footer');
    }

    function bimpan()
    {

        $data = [


            'nilai_nim' => $this->input->post('nilai_nim'),
            'nilai_partnert' => $this->input->post('nilai_partnert'),
            'pesan' => $this->input->post('pesan')
        ];

        $this->db->set($data);
        $this->db->where('id_proyek', $this->input->post('id_proyek'),);
        $this->db->update('bimbingan');


        redirect(base_url('dospem/proyek'));
    }
}
