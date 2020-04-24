<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumahsakit extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_rumahsakit');
  }
  public function index()
  {
    $data['title'] = 'Data Kabupaten / Kota';
    $data['rs'] = $this->M_rumahsakit->rs();
    $this->template->load('backend_site','r-rumahsakit', $data);
  }
  
  public function create_rs()
  {
    $data['title'] = 'Tambah Rumah Sakit';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $this->template->load('backend_site','c-rs', $data);
  }

  function post_create_rs()
  {
    $rumah_sakit = $this->input->post('rumah_sakit');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $lat = $this->input->post('lat');
    $lon = $this->input->post('lon');
    $no_telfon = $this->input->post('no_telfon');
    $alamat = $this->input->post('alamat');
    $status_rs = $this->input->post('status_rs');

    $data = array(
      'rumah_sakit'   => $rumah_sakit,
      'id_kabupaten'  => $id_kabupaten,
      'lat'           => $lat,
      'lon'           => $lon,
      'no_telfon'     => $no_telfon,
      'alamat_rs'     => $alamat,
      'status_rs'     => $status_rs
    );

    $this->M_rumahsakit->create_rs($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Ditambahkan.</code>
      </div>"
    );
    redirect('Rumahsakit');
  }
}