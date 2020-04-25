<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller{
    function  __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('M_users');
    }

    public function index()
    {
        $data['title'] = 'Users';
        $data['users'] = $this->M_users->users();

        $this->template->load('backend_site','r-users', $data);
    }

    public function create_user()
    {
        $data['title'] = 'Buat User baru';
        $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten ")->result();
        $data['level'] = $this->db->query("SELECT * FROM tb_user_level")->result();
        $this->template->load('backend_site','c-user', $data);
    }

    function create_user_post()
    {
        $nama = $this->input->post('nama');
        $sandi = md5($this->input->post('sandi'));
        $sandi_deskripsi = $this->input->post('sandi');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $kontak = $this->input->post('kontak');
        $email = $this->input->post('email');
        $status = $this->input->post('status');
        $level = $this->input->post('level');
        $id_kabupaten = $this->input->post('id_kabupaten');

        $data = array(
            'nama'              => $nama,
            'sandi'             => $sandi,
            'sandi_deskripsi'   => $sandi_deskripsi,
            'nama_lengkap'      => $nama_lengkap,
            'kontak'            => $kontak,
            'email'             => $email,
            'status'            => $status,
            'level'             => $level,
            'id_kabupaten'      => $id_kabupaten
        );

        $this->M_users->create_user($data);
        $this->session->set_flashdata(
        "save",
        "<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <i class='icofont icofont-close-line-circled'></i>
            </button>
            <strong>Success!</strong> <code> User Telah ditambahkan.</code>
        </div>"
        );
        redirect('Users');
    }
}