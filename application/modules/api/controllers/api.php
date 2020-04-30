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
}