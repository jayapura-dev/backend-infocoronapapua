<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_rekap');
  }
  public function kabkota()
  {
    $data['title'] = 'Rekap Data Kabupaten / Kota';
    $data['kabkota'] = $this->M_rekap->rekapkabkota();
    $this->template->load('backend_site','r-rek-kabkota', $data);
  }

  public function print_kabkota()
  {
    $data['title'] = 'Print Rekap Per Kabupaten/Kota';
    $data['kabkota'] = $this->M_rekap->rekapkabkota();

    $this->load->view('p-rek-kabkota',$data);
  }

  public function rekap_hari()
  {
    $data['title'] = 'Rekap Per Hari';
    $data['hari'] = $this->M_rekap->rekaphari();

    $this->template->load('backend_site','r-rek-hari', $data);
  }

  public function create_rekap()
  {
    $data['title'] = 'Rekap Data';
    $data['odp'] = $this->M_rekap->rek_odp();
    $data['pdp'] = $this->M_rekap->rek_pdp();
    $data['suspect'] = $this->M_rekap->rek_suspect();
    $data['prosentase'] = $this->M_rekap->prosentase();

    $this->template->load('backend_site','c-rek-hari', $data);
  }
  
  function create_rekap_hari_post()
  {
    $tanggal = $this->input->post('tanggal');
    $odp = $this->input->post('odp');
    $pdp = $this->input->post('pdp');
    $confirm = $this->input->post('confirm');
    $positif = $this->input->post('positif');
    $sembuh = $this->input->post('sembuh');
    $meninggal = $this->input->post('meninggal');
    $p_positif = $this->input->post('p_positif');
    $p_meninggal = $this->input->post('p_meninggal');
    $p_sembuh = $this->input->post('p_sembuh');

    $data = array(
      'tanggal'     => $tanggal,
      'odp'         => $odp,
      'pdp'         => $pdp,
      'confirm'     => $confirm,
      'positif'     => $positif,
      'sembuh'      => $sembuh,
      'meninggal'   => $meninggal,
      'p_positif'   => $p_positif,
      'p_meninggal' => $p_meninggal,
      'p_sembuh'    => $p_sembuh
    );

    $this->M_rekap->create_rekap_hari($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Data Telah direkap.</code>
      </div>"
    );
    redirect('Rekap/rekap_hari');
  }
}