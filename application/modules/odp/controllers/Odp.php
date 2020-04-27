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
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
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

  function update_odp_post()
  {
    $id_odp = $this->input->post('id_odp');
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
      'id_odp'      => $id_opd,
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

    $where = array('id_odp' => $id_odp);

    $this->M_odp->update_odp($where,$data,'tb_odp');

    $this->session->set_flashdata(
      "edit",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah di Update.</code>
      </div>"
    );
    redirect('Odp/data_odp');
  }

  public function delete_odp($id_odp)
  {
    $data['title'] = 'Hapus OPD';
    $data['detail'] = $this->db->query("SELECT * FROM tb_odp WHERE id_odp = '$id_odp' ")->row_array();
    $this->template->load('backend_site','d-odp', $data);
  }

  function delete_odp_post($id_odp = 0)
  {
    $id_odp = $this->input->post('id_odp');
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "delete",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah dihapus.</code>
      </div>"
    );
    redirect('Odp/data_odp');
  }

  function pdp_post_from_odp()
  {
    $id_odp = $this->input->post('id_odp');

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

    $this->M_odp->create_pdp($data);
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "save_to_pdp",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Pindah Ke Data PDP.</code>
      </div>"
    );
    redirect('Odp/data_odp');
  }

  function suspect_post_from_odp()
  {
    $id_odp = $this->input->post('id_odp');

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

    $this->M_odp->create_suspect($data);
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "save_to_suspect",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Pindah Ke Data Pasien Suspect (Positif).</code>
      </div>"
    );
    redirect('Odp/data_odp');
  }

  public function print_odp()
  {
    $data['title'] = 'Print ODP';
    $data['odp'] = $this->M_odp->odp();

    $this->load->view('p-odp',$data);
  }

  // Level Users:

  public function user_data_odp()
  {
    $data['title'] = 'Data ODP';
    $data['odp'] = $this->M_odp->odp_user();
    $data['rslist'] = $this->db->query("SELECT * FROM tb_rs_rujukan")->result();
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $this->template->load('backend_site','users/r-odp', $data);
  }

  public function user_create_odp()
  {
    $data['title'] = 'Tambah ODP';
    $data['kabupatenlist'] = $this->db->query("SELECT * FROM tb_kabupaten")->result();
    $this->template->load('backend_site','users/c-odp', $data);
  }

  function user_create_odp_post()
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
    redirect('Odp/user_data_odp');
  }

  function user_update_odp_post()
  {
    $id_odp = $this->input->post('id_odp');
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
      'id_odp'      => $id_odp,
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

    $where = array('id_odp' => $id_odp);

    $this->M_odp->update_odp($where,$data,'tb_odp');

    $this->session->set_flashdata(
      "edit",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah di Update.</code>
      </div>"
    );
    redirect('Odp/user_data_odp');
  }

  public function user_delete_odp($id_odp)
  {
    $data['title'] = 'Hapus OPD';
    $data['detail'] = $this->db->query("SELECT * FROM tb_odp WHERE id_odp = '$id_odp' ")->row_array();
    $this->template->load('backend_site','users/d-odp', $data);
  }

  function user_delete_odp_post($id_odp = 0)
  {
    $id_odp = $this->input->post('id_odp');
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "delete",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item telah dihapus.</code>
      </div>"
    );
    redirect('Odp/user_data_odp');
  }


  function user_pdp_post_from_odp()
  {
    $id_odp = $this->input->post('id_odp');

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

    $this->M_odp->create_pdp($data);
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "save_to_pdp",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Pindah Ke Data PDP.</code>
      </div>"
    );
    redirect('Odp/user_data_odp');
  }

  function user_suspect_post_from_odp()
  {
    $id_odp = $this->input->post('id_odp');

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

    $this->M_odp->create_suspect($data);
    $this->M_odp->delete_odp($id_odp);

    $this->session->set_flashdata(
      "save_to_suspect",
      "<div class='alert alert-success'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <i class='icofont icofont-close-line-circled'></i>
        </button>
        <strong>Success!</strong> <code> Item Telah Pindah Ke Data Pasien Suspect (Positif).</code>
      </div>"
    );
    redirect('Odp/user_data_odp');
  }
}