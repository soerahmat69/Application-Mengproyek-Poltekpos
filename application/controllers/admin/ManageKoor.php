<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageKoor extends CI_Controller
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
        $this->db->where('level in (3)');
        $user = $this->db->get('user')->result_array();

        $this->db->join('user', 'kegiatan.dosen_koor = user.nim', 'left');
        $kegiatan = $this->db->get('kegiatan')->result_array();


        $title = [
            'judul' => 'Manage User',
            'nama' => $this->session->userdata('nama'),
            'nim' => $this->session->userdata('nim'),
            'kegiatan' => $kegiatan,
            'user' => $user

        ];


        $this->load->view('admin/layout/main', $title);
        $this->load->view('admin/koor');
        $this->load->view('admin/layout/footer');
    }

    function tambah_koor()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'pass' => $this->input->post('pass'),
            'level' => "3",
            'nama' => $this->input->post('nama')
        ];

        $this->db->insert('user', $data);
        return redirect(base_url('admin/ManageKoor'));
    }

    function tambah_kegiatan()
    {
        $data = [
            'nama_kegiatan' => $this->input->post('nama')
        ];
        $this->db->insert('kegiatan', $data);
        return redirect(base_url('admin/ManageKoor'));
    }

    function edit_mhs()
    {
        $data = [
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'pass' => $this->input->post('pass')
        ];
        $this->db->set($data);
        $this->db->where('nim = ' . $this->input->post('nim'));
        $this->db->update('user', $data);
        return redirect(base_url('admin/ManageUser'));
    }

    function hapus_mhs()
    {
        $this->db->where('nim', $this->input->post('nim'));
        $this->db->delete('user');
        return redirect(base_url('admin/ManageUser'));
    }
}
