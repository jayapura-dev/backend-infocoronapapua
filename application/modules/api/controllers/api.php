<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller {
  function  __construct()
  {
      parent::__construct();
      $this->load->model('M_api');
  }

  function index_get()
  {
    $kabkota = $this->M_api->rekapkabkota();

    foreach($kabkota as $item){
        $posts[] = array(
            'id_kabupaten'  => $item->id_kabupaten,
            'kabupaten'     => $item->nama_kab,
            'confirm'       => $item->confirm,
            'positif'       => $item->positif,
            'meninggal'     => $item->meninggal,
            'sembuh'        => $item->sembuh,
            'logo_thumb'    => base_url().'assets/backend/images/kabkota/'.$item->logo
        );
    }

    if ($kabkota) {
      $this->response([
        'status'  => true,
        'kabkota' => $posts
      ], REST_Controller::HTTP_OK);
    }
  }

  function suspect_get()
  {
    $suspect = $this->M_api->suspect();

    foreach($suspect as $item){
        $posts[] = array(
            'id_suspect'    => $item->id_suspect,
            'kabupaten'     => $item->nama_kab,
            'umur'          => $item->umur,
            'gender'        => $item->gender,
            'alamat'        => $item->alamat,
            'rumah_sakit'   => $item->rumah_sakit,
            'status'        => $item->status_pasien,
            'date_created'  => $item->date_created
        );
    }

    if ($suspect) {
      $this->response([
        'status'  => true,
        'suspect' => $posts
      ], REST_Controller::HTTP_OK);
    }
  }

  public function infosuspect_get()
  {
    $info = $this->M_api->rekap_suspect();

    foreach($info as $item){
        $posts[] = array(
            'confirm'    => $item->Confirm,
            'positif'    => $item->Positif,
            'sembuh'     => $item->Sembuh,
            'meninggal'  => $item->Meninggal
        );
    }

    if ($info) {
      $this->response([
        'status'  => true,
        'result'  => $posts
      ], REST_Controller::HTTP_OK);
    }
  }

  public function prosentase_get()
  {
    $prosentase = $this->M_api->prosentase_suspect();

    foreach($prosentase as $item){
        $posts[] = array(
            'p_positif'   => number_format($item->p_positif,1),
            'p_sembuh'    => number_format($item->p_sembuh,1),
            'p_meninggal' => number_format($item->p_meninggal,1)
        );
    }

    if ($prosentase) {
      $this->response([
        'status'  => true,
        'result'  => $posts
      ], REST_Controller::HTTP_OK);
    }
  }
}