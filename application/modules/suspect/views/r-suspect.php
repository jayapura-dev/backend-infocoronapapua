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
                  <li class="breadcrumb-item"><a href="#!">Data Pasien Suspect</a>
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
  <div class="card">
    <div class="card-header">
    <i class="icofont icofont-boy"></i> <i class="icofont icofont-girl-alt"></i><strong> DATA PASIEN SUSPECT (POSITIF) COVID 19 </strong>
      <div class="card-header-right">
        <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
        <a href="<?php echo base_url()?>Suspect/print_suspect" title="Print" target="_blank"><i class="icofont icofont-printer"></i></a>
        <a href="<?php echo base_url()?>Suspect/create_suspect" title="Tambah Data"><i class="icofont icofont-plus-square"></i></a>
      </div>
    </div>
    <div class="card-block">
      
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table small table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th>Kab/Kota</th>
              <th>Nama</th>
              <th class="col-md-1">Umur</th>
              <th>Gender</th>
              <th>Status</th>
              <th>RS</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($suspect as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
              <td><?php echo $item->nama ?></td>
              <td><?php echo $item->umur ?></td>
              <td><?php echo $item->gender ?></td>
              <td class="center">
                <?php if($item->status == 'POSITIF'): ?>
                  <label class="label label-danger">POSITIF</label>
                <?php elseif($item->status == 'MENINGAAL'): ?>
                  <label class="label label-inverse">MENINGGAL</label>
                <?php else: ?>
                  <label class="label label-success">SEMBUH</label>
                <?php endif ?>
              </td>
              <td><?php echo $item->rumah_sakit ?></td>
              <td>
                <div class="btn-group dropdown-split-inverse">
                  <button type="button" class="btn btn-inverse btn-sm"><i class="icofont icofont-exchange"></i></button>
                  <button type="button" class="btn btn-inverse btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle primary</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect waves-light" href="#">Update Status</a>
                    <a data-toggle="modal" class="dropdown-item waves-effect waves-light" href="" data-target="#update_suspect" onclick="updatesuspect(
                      '<?php echo $item->id_suspect ?>',
                      '<?php echo $item->nama ?>',
                      '<?php echo $item->gender ?>',
                      '<?php echo $item->umur ?>',
                      '<?php echo $item->alamat ?>',
                      '<?php echo $item->kontak ?>',
                      '<?php echo $item->id_rs ?>',
                      '<?php echo $item->id_kabupaten ?>',
                      '<?php echo $item->status ?>',
                      '<?php echo $item->is_from ?>',
                      '<?php echo $item->date_created ?>'
                    )">Edit</a>
                    <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url()?>Suspect/delete_suspect/<?php echo $item->id_suspect ?>">Delete</a>
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

<div class="modal fade" id="update_suspect" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="feather icon-edit"></i> Edit Item </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <?php $this->load->view('suspect/u-suspect') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
   function updatesuspect(id_suspect,nama,gender,umur,alamat,kontak,id_rs,id_kabupaten,status,is_from,date_created)
   {
     $('#uid').val(id_suspect);
     $('#unama').val(nama);
     $('#ugender').val(gender);
     $('#uumur').val(umur);
     $('#ualamat').val(alamat);
     $('#ukontak').val(kontak);
     $('#uidrs').val(id_rs);
     $('#uidkabupaten').val(id_kabupaten);
     $('#ustatus').val(status);
     $('#isfrom').val(is_from);
     $('#datecreated').val(date_created);
   }
</script>