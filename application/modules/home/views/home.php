<?php foreach($suspect as $i){
    $confirm = $i->Confirm;
    $positif = $i->Positif;
    $sembuh = $i->Sembuh;
    $meninggal = $i->Meninggal;
} ?>

<?php foreach($prosentase as $p){
    $p_positif = $p->p_positif;
    $p_sembuh = $p->p_sembuh;
    $p_meninggal = $p->p_meninggal;
} ?>

<div class="hero-section app-hero">
    <div class="container">
        <div class="hero-content app-hero-content text-center">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <h1 class="wow fadeInUp" data-wow-delay="0s">INFO CORONA PAPUA</h1>
                    <p class="wow fadeInUp" data-wow-delay="0.2s">
                        COVID 19 PAPUA & INDONESIA LIVE DATA
                    </p>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="flex-features" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card-counter yellow">
                    <img src="<?php echo base_url()?>assets/frontend/images/sedih2.png" width="70px" alt="sedih" />
                    <span class="count-numbers"><?php echo $confirm ?></span>
                    <span class="count-prosentase">100 %</span>
                    <span class="count-name">TOTAL SUSPECT</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter pink">
                    <img src="<?php echo base_url()?>assets/frontend/images/terluka.png" width="70px" alt="terluka" />
                    <span class="count-numbers"><?php echo $positif ?></span>
                    <span class="count-prosentase"><?php echo number_format($p_positif,2) ?> %</span>
                    <span class="count-name">TOTAL POSITIF</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter lightgreen">
                    <img src="<?php echo base_url()?>assets/frontend/images/senang.png" width="70px" alt="senang" />
                    <span class="count-numbers"><?php echo $sembuh ?></span>
                    <span class="count-prosentase"><?php echo number_format($p_sembuh,2) ?> %</span>
                    <span class="count-name">TOTAL SEMBUH</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-counter darkgreen">
                    <img src="<?php echo base_url()?>assets/frontend/images/menangis.png" width="70px" alt="menangis" />
                    <span class="count-numbers"><?php echo $meninggal ?></span>
                    <span class="count-prosentase"><?php echo number_format($p_meninggal,2) ?> %</span>
                    <span class="count-name">TOTAL MENINGGAL</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex-features" id="features">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mt-12">
                <div class="card">
                    <div class="card-header">
                        <h3>PASIEN SUSPECT</h3>
                    </div>
                    <div class="card-block">
                        <div class=table-responsive>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center"><strong>NO</strong></th>
                                        <th><strong>KABUPATEN / KOTA</strong></th>
                                        <th class="text-center">GENDER</th>
                                        <th class="text-center">UMUR</th>
                                        <th class="text-center">STATUS</th>
                                        <th>DIRAWAT DI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($datasuspect as $item){?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
                                        <td class="text-center">
                                            <?php if($item->gender == 'L'):?>
                                            <img src="<?php echo base_url()?>assets/frontend/images/male2.png" width="25px" alt="male" />
                                            <?php else: ?>
                                                <img src="<?php echo base_url()?>assets/frontend/images/female2.png" width="25px" alt="female" />
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center"><?php echo $item->umur ?></td>
                                        <td class="text-center">
                                            <?php if($item->status == 'POSITIF'):?>
                                                <label class="badge badge-danger"><?php echo $item->status ?></label>
                                            <?php elseif($item->status == 'SEMBUH'):?>
                                                <label class="badge badge-info"><?php echo $item->status ?></label>
                                            <?php else: ?>
                                                <label class="badge badge-warning"><?php echo $item->status ?></label>
                                            <?php endif ?>
                                        </td>
                                        <td><?php echo $item->rs ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
