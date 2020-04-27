<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suspect extends MX_Controller{
  function  __construct()
  {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->model('M_suspect');
  }
  public function data_suspect()
  {
    $data['title'] = 'Data Pasien Suspect';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $data['suspect'] = $this->M_suspect->suspect();

    $this->template->load('backend_site','r-suspect', $data);
  }
  
  public function create_suspect()
  {
    $data['title'] = 'Tambah Suspect';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','c-suspect' ,$data);
  }

  function create_suspect_post()
  {
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $status = $this->input->post('status');
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
      'status'      => $status,
      'is_from'     => $is_from,
      'date_created'=> $date_created
    );

    $this->M_suspect->create_suspect($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Disimpan.</code>
      </div>"
    );
    redirect('Suspect/data_suspect');
  }

  function update_suspect_post()
  {
    $id_suspect = $this->input->post('id_suspect');
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $status = $this->input->post('status');
    $is_from = $this->input->post('is_from');
    $date_created = $this->input->post('date_created');

    $data = array(
      'id_suspect'  => $id_suspect,
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'status'      => $status,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
      'date_created'=> $date_created
    );

    $where = array('id_suspect' => $id_suspect);

    $this->M_suspect->update_suspect($where,$data,'tb_suspect');

    $this->session->set_flashdata(
      "update",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Di update.</code>
      </div>"
    );
    redirect('Suspect/data_suspect');
  }

  public function delete_suspect($id_suspect)
  {
    $data['title'] = 'Hapus Item';
    $data['detail'] = $this->db->query("SELECT * FROM tb_suspect WHERE id_suspect = '$id_suspect' ")->row_array();

    $this->template->load('backend_site','d-suspect', $data);
  }

  function delete_suspect_post($id_suspect = 0)
  {
    $id_suspect = $this->input->post('id_suspect');
    $this->M_suspect->delete_suspect($id_suspect);

    $this->session->set_flashdata(
      "delete",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah dihapus.</code>
      </div>"
    );
    redirect('Suspect/data_suspect');
  }

  public function print_suspect()
  {
    $data['title'] = 'Print Data Suspect';
    $data['suspect'] = $this->M_suspect->suspect();

    $this->load->view('p-suspect', $data);
  }

  // Level User

  public function user_data_suspect()
  {
    $data['title'] = 'Data Pasien Suspect';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $data['suspect'] = $this->M_suspect->user_suspect();

    $this->template->load('backend_site','users/r-suspect', $data);
  }
  
  public function user_create_suspect()
  {
    $data['title'] = 'Tambah Suspect';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $this->template->load('backend_site','users/c-suspect' ,$data);
  }

  function user_create_suspect_post()
  {
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $status = $this->input->post('status');
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
      'status'      => $status,
      'is_from'     => $is_from,
      'date_created'=> $date_created
    );

    $this->M_suspect->create_suspect($data);

    $this->session->set_flashdata(
      "save",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Disimpan.</code>
      </div>"
    );
    redirect('Suspect/user_data_suspect');
  }

  function user_update_suspect_post()
  {
    $id_suspect = $this->input->post('id_suspect');
    $nama = $this->input->post('nama');
    $gender = $this->input->post('gender');
    $umur = $this->input->post('umur');
    $alamat = $this->input->post('alamat');
    $kontak = $this->input->post('kontak');
    $id_kabupaten = $this->input->post('id_kabupaten');
    $id_rs = $this->input->post('id_rs');
    $status = $this->input->post('status');
    $is_from = $this->input->post('is_from');
    $date_created = $this->input->post('date_created');

    $data = array(
      'id_suspect'  => $id_suspect,
      'nama'        => $nama,
      'gender'      => $gender,
      'umur'        => $umur,
      'alamat'      => $alamat,
      'kontak'      => $kontak,
      'id_kabupaten'=> $id_kabupaten,
      'status'      => $status,
      'id_rs'       => $id_rs,
      'is_from'     => $is_from,
      'date_created'=> $date_created
    );

    $where = array('id_suspect' => $id_suspect);

    $this->M_suspect->update_suspect($where,$data,'tb_suspect');

    $this->session->set_flashdata(
      "update",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Di update.</code>
      </div>"
    );
    redirect('Suspect/user_data_suspect');
  }

  public function user_delete_suspect($id_suspect)
  {
    $data['title'] = 'Hapus Item';
    $data['detail'] = $this->db->query("SELECT * FROM tb_suspect WHERE id_suspect = '$id_suspect' ")->row_array();

    $this->template->load('backend_site','users/d-suspect', $data);
  }

  function user_delete_suspect_post($id_suspect = 0)
  {
    $id_suspect = $this->input->post('id_suspect');
    $this->M_suspect->delete_suspect($id_suspect);

    $this->session->set_flashdata(
      "delete",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah dihapus.</code>
      </div>"
    );
    redirect('Suspect/user_data_suspect');
  }

  public function user_print_suspect()
  {
    $data['title'] = 'Print Data Suspect';
    $data['suspect'] = $this->M_suspect->user_suspect();

    $this->load->view('users/p-suspect', $data);
  }
}