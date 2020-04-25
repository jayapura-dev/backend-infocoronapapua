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
              <li class="breadcrumb-item"><a href="#!">Rekap</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Rekap Per Hari</a>
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
      <i class="icofont icofont-document-search"></i></i> <strong>REKAP PER HARI </strong>
      <div class="card-header-right">
        <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
        <a href="#" title="Print"><i class="icofont icofont-printer"></i></a>
        <a href="<?php echo base_url()?>Rekap/create_rekap" title="Rekap Data"><i class="icofont icofont-plus-square"></i></a>
      </div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table small table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th>Tanggal</th>
              <th>ODP</th>
              <th>PDP</th>
              <th>CONFIRM</th>
              <th>POSITIF</th>
              <th>SEMBUH</th>
              <th>MENINGGAL</th>
              <th>Positif %</th>
              <th>Sembuh % </th>
              <th>Meninggal % </th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($hari as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $item->tanggal ?></td>
              <td><?php echo $item->odp ?></td>
              <td><?php echo $item->pdp ?></td>
              <td><?php echo $item->confirm ?></td>
              <td><?php echo $item->positif ?></td>
              <td><?php echo $item->sembuh ?></td>
              <td><?php echo $item->meninggal ?></td>
              <td><?php echo $item->p_positif ?></td>
              <td><?php echo $item->p_sembuh ?></td>
              <td><?php echo $item->p_meninggal ?></td>
              <td>
              <div class="btn-group dropdown-split-inverse">
                  <button type="button" class="btn btn-inverse btn-sm"><i class="icofont icofont-exchange"></i></button>
                  <button type="button" class="btn btn-inverse btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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