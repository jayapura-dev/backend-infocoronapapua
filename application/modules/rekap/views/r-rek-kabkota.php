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
            <li class="breadcrumb-item"><a href="#!">Report</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Rekap Kabupaten</a>
            </li>
          </ul>
         </div>
      </div>
  </div>
</div>

<div class="page-body">
  <div class="card">
    <div class="card-header">
      <i class="icofont icofont-boy"></i> <i class="icofont icofont-girl-alt"></i> <strong> REKAP DATA PER KABUPATEN / KOTA </strong>
      <div class="card-header-right">
        <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
        <a href="#" title="Print"><i class="icofont icofont-printer"></i></a>
      </div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="simpletable" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th class="col-md-1">No</th>
              <th>Kab/Kota</th>
              <th>ODP</th>
              <th>PDP</th>
              <th>CONFIRM</th>
              <th>POSITIF</th>
              <th>SEMBUH</th></th>
              <th>MENINGGAL</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($kabkota as $item){?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
              <td><?php echo $item->odp ?></td>
              <td><?php echo $item->pdp ?></td>
              <td><?php echo $item->confirm ?></td>
              <td><?php echo $item->positif ?></td>
              <td><?php echo $item->sembuh ?></td>
              <td><?php echo $item->meninggal ?></td>
              <td></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>