<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdp extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_pdp');
  }
  public function data_pdp()
  {
      $data['title'] = 'Data PDP';
      $data['pdp'] = $this->M_pdp->pdp();

      $this->template->load('backend_site','r-pdp', $data);
  }
  public function create_pdp()
  {
    $data['title'] = 'Tambah PDP';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','c-pdp', $data);
  }
  function create_pdp_post()
  {
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'id_rs'       => $id_rs,
      'date_created'=> $date_created
    );

    $this->M_pdp->create_pdp($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Berhasil Ditambah</code>
      </div>"
    );
    redirect('Pdp/data_pdp');
  }
}