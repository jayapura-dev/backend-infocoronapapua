<link href="<?php echo base_url()?>assets\backend\css\card.css" rel="stylesheet" type="text/css">

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
            <div class="row">
                <div class="col-md-3">
                    <div class="card-counter yellow">
                        <img src="<?php echo base_url()?>assets/frontend/images/sedih2.png" width="45px" alt="sedih" />
                        <span class="count-numbers"><?php echo $countsuspect['confirm'] ?></span>
                        <span class="count-prosentase">100 %</span>
                        <span class="count-name">CONFIRM</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter pink">
                        <img src="<?php echo base_url()?>assets/frontend/images/terluka.png" width="45px" alt="sedih" />
                        <span class="count-numbers"><?php echo $countsuspect['positif'] ?></span>
                        <span class="count-prosentase"><?php echo number_format($prosuspect['p_positif'],1) ?> %</span>
                        <span class="count-name">PERAWATAN</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter lightgreen">
                        <img src="<?php echo base_url()?>assets/frontend/images/senang.png" width="45px" alt="sedih" />
                        <span class="count-numbers"><?php echo $countsuspect['sembuh'] ?></span>
                        <span class="count-prosentase"><?php echo number_format($prosuspect['p_sembuh'],1) ?> %</span>
                        <span class="count-name">SEMBUH</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card-counter darkgreen">
                        <img src="<?php echo base_url()?>assets/frontend/images/menangis.png" width="45px" alt="sedih" />
                        <span class="count-numbers"><?php echo $countsuspect['meninggal'] ?></span>
                        <span class="count-prosentase"><?php echo number_format($prosuspect['p_meninggal'],1) ?> %</span>
                        <span class="count-name">MENINGGAL</span>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="table-responsive">
            <table class="table small table-bordered">
                <thead></thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Gender</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($kabkotasuspect as $item){ ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $item->nama ?></td>
                        <td class="text-center"><?php echo $item->umur ?></td>
                        <td class="text-center">
                            <?php if($item->gender == 'L'):?>
                            <img src="<?php echo base_url()?>assets/frontend/images/male2.png" width="20px" alt="male" />
                            <?php else: ?>
                                <img src="<?php echo base_url()?>assets/frontend/images/female2.png" width="20px" alt="female" />
                            <?php endif ?>
                        </td>
                        <td class="text-center">
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