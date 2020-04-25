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
                  <li class="breadcrumb-item"><a href="#!">Users</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>

<div class="page-body">
  <?php echo $this->session->flashdata('save');?>
  <div class="card">
    <div class="card-header">
      <i class="icofont icofont-ui-unlock"></i> <strong> DATA USERS PENGGUNA </strong>
      <div class="card-header-right">
        <a href="<?php echo base_url()?>Users/create_user" title="Tambah Data"><i class="icofont icofont-plus-square"></i></a>
      </div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th>Users</th>
              <th>Level</th>
              <th>Kabupaten</th>
              <th>Status</th>
              <th>Kontak</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($users as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $item->nama ?></td>
              <td>
                <?php if($item->id_level == '1'):?>
                  <label class="label label-success">Administrator</label>
                <?php else: ?>
                  <label class="label label-primary">User</label>
                <?php endif ?>
              </td>
              <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
              <td><?php echo $item->status ?></td>
              <td><?php echo $item->kontak ?></td>
              <td><?php echo $item->email ?></td>
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
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





