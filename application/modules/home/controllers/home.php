<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{

  var $kawalcorona ="";

  function  __construct()
  {
      parent::__construct();
      $this->kawalcorona = "https://api.kawalcorona.com";
      $this->load->library('form_validation');
      $this->load->library('curl');
      $this->load->helper('form','url');
      $this->load->model(array(
        'dashboard/M_dashboard',
        'M_home'));
        

  }

  public function index()
  {
      $data['title'] = 'Info Corona Papua | Live Data Indonesia & Papua';
      $data['suspect'] = $this->M_dashboard->rekap_suspect();
      $data['prosentase'] = $this->M_dashboard->prosentase_suspect();
      $data['datasuspect'] = $this->db->query("SELECT * FROM v_suspect ")->result();
      $data['sus'] = $this->M_home->rekapkabkota();
      $data['suskab'] = $this->M_dashboard->suspect_kabkota();
      $data['dataindo'] = json_decode($this->curl->simple_get($this->kawalcorona.'/indonesia'));
      $data['dataprovinsi'] = json_decode($this->curl->simple_get($this->kawalcorona.'/indonesia/provinsi'));
      $this->template->load('frontend_site','home',$data);
  }

  public function hotline()
  {
    $data['title'] = 'Hotline Covid 19 Papua';
    $this->template->load('frontend_site','hotline',$data);
  }

  public function api()
  {
    $data['title'] = 'API For Developers';
    $this->template->load('frontend_site','api',$data);
  }

  public function get_suspect_kabkota($id_kabupaten)
  {
    $data['kabkotasuspect'] = $this->M_dashboard->get_suspect_kabkota($id_kabupaten);
    $data['kabupaten'] = $this->db->query("SELECT * FROM tb_kabupaten WHERE id_kabupaten = '$id_kabupaten'")->row_array();
    $data['countsuspect'] = $this->M_dashboard->get_count_suspect($id_kabupaten);
    $data['prosuspect'] = $this->M_dashboard->get_porsentase_suspect($id_kabupaten);
    $this->load->view('r-kabkota-suspect',$data);
  }
}