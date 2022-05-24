<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
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

        $nim = $this->session->userdata('nim');
        $where = "level in (1) and nim not in (" . $nim . ")";

        $this->db->where($where);
        $this->db->from('user');
        $user =  $this->db->get()->result_array();


        $wheres = "accept is null and  partnert =" . $nim . "";
        $this->db->where($wheres);
        $this->db->from('team');
        $team = $this->db->get()->result_array();

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
            'judul' => 'Bergabung Team',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'user' => $user,
            'team' => $team,
            'recent' => $this->Team_M->RecentTeam($nim),
            'zewels' => $zewels
        ];

        $this->load->view('mahasiswa/layout/main', $title);
        $this->load->view('mahasiswa/team', $title);
        $this->load->view('mahasiswa/layout/footer');
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
        $id_team = $this->input->post('id_team');

        if (isset($acc)) {
            $data = [
                'id_team' => $id_team,
                'accept' => $acc
            ];
            $this->db->where('id_team', $data['id_team']);
            $this->db->set('accept', $data['accept']);
            $this->db->update('team',);
            return redirect(base_url('mahasiswa/team'));
        } else {
            echo "salah";
        }
    }
}
