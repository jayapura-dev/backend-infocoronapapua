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
              <li class="breadcrumb-item"><a href="#!">Data ODP</a>
              </li>
          </ul>
        </div>
    </div>
  </div>
</div>

<div class="page-body">
  <?php echo $this->session->flashdata('save');?>
  <?php echo $this->session->flashdata('edit');?>
  <?php echo $this->session->flashdata('delete');?>
  <div class="card">
    <div class="card-header">
      <i class="icofont icofont-users-social"></i><strong> DATA ORANG DALAM PANTAUAN (ODP) </strong>
      <div class="card-header-right">
        <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
        <a href="#" title="Print"><i class="icofont icofont-printer"></i></a>
        <a href="#" title="Export PDF"><i class="icofont icofont-file-pdf"></i></a>
        <a href="<?php echo base_url()?>Odp/create_odp" title="Tambah Data"><i class="icofont icofont-plus-square"></i></a>
      </div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table small table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th class="col-md-3">Kab/Kota</th>
              <th class="col-md-3">Nama</th>
              <th class="col-md-1">Umur</th>
              <th>Gender</th>
              <th class="col-md-1">Kontak</th>
              <th class="col-md-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($odp as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
              <td><?php echo $item->nama ?></td>
              <td><?php echo $item->umur ?></td>
              <td class="center">
                <?php if($item->gender == 'L'): ?>
                  <i class="icofont icofont-hotel-boy" title="Pria"></i>
                <?php else: ?>
                  <i class="icofont icofont-girl-alt" title="Wanita"></i>
                <?php endif ?>
              </td>
              <td><?php echo $item->no_kontak ?></td>
              
              <td>
                <div class="btn-group dropdown-split-primary">
                  <button type="button" class="btn btn-primary btn-sm"><i class="icofont icofont-ui-edit"></i></button>
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle primary</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect waves-light" href="#">Edit</a>
                    <a class="dropdown-item waves-effect waves-light" href="#">Delete</a>
                </div>
                <div class="btn-group dropdown-split-inverse">
                  <button type="button" class="btn btn-inverse btn-sm"><i class="icofont icofont-exchange"></i></button>
                  <button type="button" class="btn btn-inverse btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle primary</span>
                  </button>
                  <div class="dropdown-menu">
                    <a data-toggle="modal" class="dropdown-item waves-effect waves-light" href="" data-target="#SendPdp" onclick="sendodp(
                      '<?php echo $item->nama ?>',
                      '<?php echo $item->gender ?>',
                      '<?php echo $item->umur ?>',
                      '<?php echo $item->alamat ?>',
                      '<?php echo $item->no_kontak ?>',
                      '<?php echo $item->id_kabupaten ?>'
                    )">ke PDP</a>
                    <a data-toggle="modal" class="dropdown-item waves-effect waves-light" href="" data-target="#SendSuspect" onclick="sendsuspect(
                      '<?php echo $item->nama ?>',
                      '<?php echo $item->gender ?>',
                      '<?php echo $item->umur ?>',
                      '<?php echo $item->alamat ?>',
                      '<?php echo $item->no_kontak ?>',
                      '<?php echo $item->id_kabupaten ?>'
                    )">Ke Suspect</a>
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


<div class="modal fade" id="SendPdp" tabindex="-1" role="dialog">
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
                  <strong>Peringatan!</strong> <code>Anda Akan Mengirimkan Item ODP ini Ke Data PDP Apakah Anda Yakin ? Jika Ya, Lengkapi / Pilih <strong>Rumah Sakit</strong> Tempat Pasien Di Rawat.</code></p>
              </div>
               <?php $this->load->view('odp/odp_sent_pdp') ?>
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
               <h5 class="modal-title"><i class="feather icon-users"></i> Pindahkan Data Ke Pasien Suspect </h5>
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
                  <strong>Peringatan!</strong> <code>Anda Akan Mengirimkan Item ODP ini Ke Data Pasien Suspect Apakah Anda Yakin ? Jika Ya, Lengkapi / Pilih <strong>Rumah Sakit</strong> Tempat Pasien Di Rawat.</code></p>
              </div>
               <?php $this->load->view('odp/odp_sent_suspect') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function sendodp(nama,gender,umur,alamat,no_kontak,id_kabupaten){
      $('#pdpnama').val(nama);
      $('#pdpgender').val(gender);
      $('#pdpumur').val(umur);
      $('#pdpalamat').val(alamat);
      $('#pdpkontak').val(no_kontak);
      $('#pdpidkabupaten').val(id_kabupaten);
    }

    function sendsuspect(nama,gender,umur,alamat,no_kontak,id_kabupaten){
      $('#snama').val(nama);
      $('#sgender').val(gender);
      $('#sumur').val(umur);
      $('#salamat').val(alamat);
      $('#skontak').val(no_kontak);
      $('#sidkabupaten').val(id_kabupaten);
    }
  
</script>





