<script src="<?php echo base_url()?>assets\backend\js\jquery-1.11.3.min.js"></script>

<div class="page-header">
  <div class="row align-items-end">
      <div class="col-lg-12">
          <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">Data PDP</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>

<div class="page-body">
  <?php echo $this->session->flashdata('save');?>
  <?php echo $this->session->flashdata('update');?>
  <?php echo $this->session->flashdata('delete');?>
  <?php echo $this->session->flashdata('save_to_suspect');?>
  <div class="card">
    <div class="card-header">
      <i class="icofont icofont-boy"></i> <i class="icofont icofont-girl-alt"></i> <strong> DATA PASIEN DALAM PENGAWASAN (PDP) </strong>
      <div class="card-header-right">
        <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
        <a href="<?php echo base_url()?>Pdp/print_pdp" title="Print" target="_blank"><i class="icofont icofont-printer"></i></a>
        <a href="<?php echo base_url()?>Pdp/create_pdp" title="Tambah Data"><i class="icofont icofont-plus-square"></i></a>
      </div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table small table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th>Kab/Kota</th>
              <th class="col-md-3">Nama</th>
              <th class="col-md-1">Umur</th>
              <th>Gender</th>
              <th class="col-md-1">Kontak</th>
              <th>RS</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($pdp as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
              <td><?php echo $item->nama ?></td>
              <td><?php echo $item->umur ?></td>
              <td class="center">
                <?php if($item->gender == 'L'): ?>
                  <i class="icofont icofont-hotel-boy container" title="Pria"></i>
                <?php else: ?>
                  <i class="icofont icofont-girl-alt container" title="Wanita"></i>
                <?php endif ?>
              </td>
              <td><?php echo $item->kontak ?></td>
              <td><?php echo $item->rumah_sakit ?></td>
              <td>
                <div class="btn-group dropdown-split-primary">
                  <button type="button" class="btn btn-primary btn-sm"><i class="icofont icofont-ui-edit"></i></button>
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle primary</span>
                  </button>
                  <div class="dropdown-menu">
                  <a data-toggle="modal" class="dropdown-item waves-effect waves-light" href="" data-target="#update_pdp" onclick="updatepdp(
                      '<?php echo $item->id_pdp ?>',
                      '<?php echo $item->nama ?>',
                      '<?php echo $item->gender ?>',
                      '<?php echo $item->umur ?>',
                      '<?php echo $item->alamat ?>',
                      '<?php echo $item->kontak ?>',
                      '<?php echo $item->id_rs ?>',
                      '<?php echo $item->id_kabupaten ?>',
                      '<?php echo $item->is_from ?>',
                      '<?php echo $item->date_created ?>'
                    )">Edit</a>
                    <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url()?>Pdp/delete_pdp/<?php echo $item->id_pdp ?>">Delete</a>
                </div>
                </div>
                <div class="btn-group dropdown-split-inverse">
                  <button type="button" class="btn btn-inverse btn-sm"><i class="icofont icofont-exchange"></i></button>
                  <button type="button" class="btn btn-inverse btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle primary</span>
                  </button>
                  <div class="dropdown-menu">
                  <a data-toggle="modal" class="dropdown-item waves-effect waves-light" href="" data-target="#SendSuspect" onclick="sendsuspect(
                      '<?php echo $item->id_pdp ?>',
                      '<?php echo $item->nama ?>',
                      '<?php echo $item->gender ?>',
                      '<?php echo $item->umur ?>',
                      '<?php echo $item->alamat ?>',
                      '<?php echo $item->kontak ?>',
                      '<?php echo $item->id_rs ?>',
                      '<?php echo $item->id_kabupaten ?>'
                    )">Pindah ke Suspect</a>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="update_pdp" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="feather icon-edit"></i> Edit Item </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <?php $this->load->view('pdp/u-pdp') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="SendSuspect" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="feather icon-users"></i> Pindahkan Data Ke PDP </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-primary icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p>
                  <strong>Peringatan!</strong> <code>Anda Akan Mengirimkan Item PDP ini Ke Data Pasien Suspect Apakah Anda Yakin ? Jika ya.. Harap Periksa Semua Data.</code></p>
              </div>
               <?php $this->load->view('pdp/pdp_sent_suspect') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function sendsuspect(id_pdp,nama,gender,umur,alamat,kontak,id_rs,id_kabupaten){
    $('#sid').val(id_pdp);
    $('#snama').val(nama);
    $('#sgender').val(gender);
    $('#sumur').val(umur);
    $('#salamat').val(alamat);
    $('#skontak').val(kontak);
    $('#sidrs').val(id_rs);
    $('#sidkabupaten').val(id_kabupaten);
  }
   
  function updatepdp(id_pdp,nama,gender,umur,alamat,kontak,id_rs,id_kabupaten,is_from,date_created)
  {
    $('#uid').val(id_pdp);
    $('#unama').val(nama);
    $('#ugender').val(gender);
    $('#uumur').val(umur);
    $('#ualamat').val(alamat);
    $('#ukontak').val(kontak);
    $('#uidrs').val(id_rs);
    $('#uidkabupaten').val(id_kabupaten);
    $('#is_from').val(is_from);
    $('#datecreated').val(date_created);
  }
  
</script>





