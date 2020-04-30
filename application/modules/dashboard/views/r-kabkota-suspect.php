<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <img src="<?php echo base_url()?>assets/backend/images/kabkota/<?php echo $kabupaten['logo_path'] ?>" width="35px" /> PASIEN SUSPECT <strong> <text class="text-uppercase">( <?php echo $kabupaten['nama_kab'] ?> )</text> </strong>
                <div class="card-header-right">
                    <a href="#" title="Export Excel"><i class="icofont icofont-file-excel"></i></a>
                    <a href="<?php echo base_url()?>Suspect/print_suspect" title="Print" target="_blank"><i class="icofont icofont-printer"></i></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table small table-bordered">
                <thead></thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Gender</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($kabkotasuspect as $item){ ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $item->nama ?></td>
                        <td><?php echo $item->umur ?></td>
                        <td><?php echo $item->gender ?></td>
                        <td class="center">
                            <?php if($item->status == 'POSITIF'): ?>
                            <label class="label label-danger">POSITIF</label>
                            <?php elseif($item->status == 'MENINGGAL'): ?>
                            <label class="label label-inverse">MENINGGAL</label>
                            <?php else: ?>
                            <label class="label label-success">SEMBUH</label>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>