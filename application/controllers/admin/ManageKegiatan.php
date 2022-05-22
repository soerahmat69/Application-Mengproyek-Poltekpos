<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageKegiatan extends CI_Controller
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
        $this->load->model('Team_M');
    }


    public function index()
    {

        $this->db->join('user', 'proyek.nim_dospem = user.nim');
        $proyek = $this->db->get('proyek')->result_array();

        foreach ($proyek as $lol) {

            $this->db->where('nim in(' . $lol['nim_dospeng'] . ')');
            $dospeng = $this->db->get('user')->result_array();
        }




        $title = [
            'judul' => 'Manage User',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'proyek' => $proyek,
            'dospeng' => $dospeng

        ];

        $this->load->view('admin/layout/main', $title);
        $this->load->view('admin/kegiatan');
        $this->load->view('admin/layout/footer');
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

        return redirect(base_url('mahasiswa/team'));
    }

    function terima()
    {
        $acc = $this->input->post('check');
        $nim = $this->input->post('nim_acc');
        $id_team = $this->input->post('id_team');

        if (isset($acc)) {
            $data = [
                'id_team' => $id_team,
                'nim_mhs' => $nim,
                'partnert' => $this->input->post('partnert'),
                'nama_mhs' => $this->input->post('nama_acc'),
                'accept' => $acc
            ];
            $this->db->replace('team', $data);
            return redirect(base_url('mahasiswa/team'));
        } else {
            echo "salah";
        }
    }
}
