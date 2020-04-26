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
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
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
    $is_from = $this->input->post('is_from');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
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

  function suspect_post_from_pdp()
  {
    $id_pdp = $this->input->post('id_pdp');

    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $is_from = $this->input->post('is_from');
    $status = $this->input->post('status');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
      'status'      => $status,
      'date_created'=> $date_created
    );

    $this->M_pdp->create_suspect($data);
    $this->M_pdp->delete_pdp($id_pdp);

    $this->session->set_flashdata(
      "save_to_suspect",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Pindah Ke Data Suspect.</code>
      </div>"
    );
    redirect('Pdp/data_pdp');
  }

  function update_pdp_post()
  {
    $id_pdp = $this->input->post('id_pdp');
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $is_from = $this->input->post('is_from');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
      'date_created'=> $date_created
    );

    $where = array('id_pdp' => $id_pdp);

    $this->M_pdp->update_pdp($where,$data,'tb_pdp');

    $this->session->set_flashdata(
      "update",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Diupdate/code>
      </div>"
    );
    redirect('Pdp/data_pdp');
  }

  public function delete_pdp($id_pdp)
  {
    $data['title'] = 'Hapus Item';
    $data['detail'] = $this->db->query("SELECT * FROM tb_pdp WHERE id_pdp = '$id_pdp' ")->row_array();

    $this->template->load('backend_site','d-pdp', $data);
  }

  function delete_pdp_post($id_pdp = 0)
  {
    $id_pdp = $this->input->post('id_pdp');
    $this->M_pdp->delete_pdp($id_pdp);

    $this->session->set_flashdata(
      "delete",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah dihapus.</code>
      </div>"
    );
    redirect('Pdp/data_pdp');
  }

  public function print_pdp()
  {
    $data['title'] = 'Print Data PDP';
    $data['pdp'] = $this->M_pdp->pdp();

    $this->load->view('p-pdp',$data);
  }
  // END Admin
  
  // Level User :
  public function user_data_pdp()
  {
    $data['title'] = 'Data PDP';
    $data['pdp'] = $this->M_pdp->pdp();
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','r-pdp', $data);
  }
  public function user_create_pdp()
  {
    $data['title'] = 'Tambah PDP';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','c-pdp', $data);
  }

  function user_create_pdp_post()
  {
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $is_from = $this->input->post('is_from');
    $date_created = $this->input->post('date_created');

    $data = array(
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
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
    redirect('Pdp/user_data_pdp');
  }
}