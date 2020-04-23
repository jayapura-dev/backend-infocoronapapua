<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odp extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_odp');
  }
  public function data_odp()
  {
    $data['title'] = 'Data ODP';
    $data['odp'] = $this->M_odp->odp();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','r-odp', $data);
  }
  public function create_odp()
  {
    $data['title'] = 'Tambah ODP';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $this->template->load('backend_site','c-odp', $data);
  }
  function create_odp_post()
  {
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $no_kontak = $this->input->post('no_kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $mulai_dp = $this->input->post('mulai_dp');
    $berahir_dp = $this->input->post('berahir_dp');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'no_kontak'   => $no_kontak,
      'id_kabupaten'=> $id_kabupaten,
      'mulai_dp'    => $mulai_dp,
      'berahir_dp'  => $berahir_dp,
      'date_created'=> $date_created
    );

    $this->M_odp->create_odp($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Berhasil Ditambah</code>
      </div>"
    );
    redirect('Odp/data_odp');
  }
}