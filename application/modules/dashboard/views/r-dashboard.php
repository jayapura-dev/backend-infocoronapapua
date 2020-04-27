<script type="text/javascript" src="<?php echo base_url()?>assets\bower_components\chart.js\js\Chart.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\amcharts.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\serial.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\light.js"></script>

<?php foreach($suspect as $i){
    $confirm = $i->Confirm;
    $positif = $i->Positif;
    $sembuh = $i->Sembuh;
    $meniggal = $i->Meninggal;
} ?>

<?php foreach($prosentase as $p){
    $p_positif = $p->p_positif;
    $p_sembuh = $p->p_sembuh;
    $p_meninggal = $p->p_meninggal;
} ?>

<div class="page-header">
  <div class="row align-items-end">
      <div class="col-lg-12">
        <div class="page-header-breadcrumb">
          <ul class="breadcrumb-title">
              <li class="breadcrumb-item">
                  <a href="#"> <i class="feather icon-home"></i> </a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>dashboard">Dashboard</a>
              </li>
          </ul>
        </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-xl-3 col-md-6">
    <div class="card bg-c-yellow update-card">
        <div class="card-block">
            <div class="row align-items-end">
                <div class="col-8">
                    <h4 class="text-white"><?php echo $confirm ?></h4>
                    <h6 class="text-white m-b-0">Confirm</h6>
                </div>
                <div class="col-4 text-right">
                    <canvas id="update-chart-1" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>100 %</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-c-green update-card">
        <div class="card-block">
            <div class="row align-items-end">
                <div class="col-8">
                    <h4 class="text-white"><?php echo $sembuh ?></h4>
                    <h6 class="text-white m-b-0">Sembuh</h6>
                </div>
                <div class="col-4 text-right">
                    <canvas id="update-chart-2" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>Prosentase : <?php echo number_format($p_sembuh,1) ?> %</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-c-pink update-card">
        <div class="card-block">
            <div class="row align-items-end">
                <div class="col-8">
                    <h4 class="text-white"><?php echo $positif ?></h4>
                    <h6 class="text-white m-b-0">POSITIF</h6>
                </div>
                <div class="col-4 text-right">
                    <canvas id="update-chart-3" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>Prosentase : <?php echo number_format($p_positif,1) ?> %</p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card bg-c-lite-green update-card">
        <div class="card-block">
            <div class="row align-items-end">
                <div class="col-8">
                    <h4 class="text-white"><?php echo $meniggal ?></h4>
                    <h6 class="text-white m-b-0">MENINGGAL</h6>
                </div>
                <div class="col-4 text-right">
                    <canvas id="update-chart-4" height="50"></canvas>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>Prosentase : <?php echo number_format($p_meninggal,1) ?> %</p>
        </div>
    </div>
</div>
</div>

<div class="row">
    <div class="col-xl-4 col-md-12">
      <div class="card table-card">
         <div class="card-header">
            <h5>ODP Per Kabupaten/Kota</h5>
       </div>
       <div class="card-block">
        <div class="table-responsive">
           <table class="table small table-hover table-borderless">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Kabupaten/Kota</th>
                 <th>ODP</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($odp as $item){?>
               <tr>
                 <td><?php echo $no++ ?></td>
                 <td><?php echo $item->nama_kab ?></td>
                 <td><label class="badge badge-primary"><?php echo $item->jumlah_odp ?></label></td>
               </tr>
               <?php } ?>
             </tbody>
           </table>
        </div>
      </div>
      </div>
      
    </div>

    <div class="col-xl-4 col-md-12">
      <div class="card table-card">
         <div class="card-header">
            <h5>PDP Per Kabupaten/Kota</h5>
       </div>
       <div class="card-block">
        <div class="table-responsive">
           <table class="table small table-hover table-borderless">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Kabupaten/Kota</th>
                 <th>PDP</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($pdp as $item){?>
               <tr>
                 <td><?php echo $no++ ?></td>
                 <td><?php echo $item->nama_kab ?></td>
                 <td><label class="badge badge-primary"><?php echo $item->jumlah_pdp ?></label></td>
               </tr>
               <?php } ?>
             </tbody>
           </table>
        </div>
      </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-12">
      <div class="card table-card">
         <div class="card-header">
            <h5>Pasien Suspect Kabupaten/Kota</h5>
       </div>
       <div class="card-block">
        <div class="table-responsive">
           <table class="table small table-hover table-borderless">
             <thead>
               <tr>
                 <th>No</th>
                 <th>Kabupaten/Kota</th>
                 <th>Suspect</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($sus as $pos){?>
               <tr>
                 <td><?php echo $no++ ?></td>
                 <td><?php echo $pos->nama_kab ?></td>
                 <td><label class="badge badge-primary"><?php echo $pos->jumlah_suspect ?></label></td>
               </tr>
               <?php } ?>
             </tbody>
           </table>
        </div>
      </div>
      </div>
    </div>
</div>
