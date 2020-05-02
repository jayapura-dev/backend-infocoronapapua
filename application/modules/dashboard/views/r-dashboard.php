<script type="text/javascript" src="<?php echo base_url()?>assets\bower_components\chart.js\js\Chart.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\amcharts.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\serial.js"></script>
<script src="<?php echo base_url()?>assets\backend\files\assets\pages\widget\amchart\light.js"></script>

<script src="<?php echo base_url()?>assets\backend\js\jquery-1.11.3.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets\backend\css\fixed_header_table.css">

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
                    <h6 class="text-white m-b-0">CONFIRM</h6>
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
                    <h6 class="text-white m-b-0">SEMBUH</h6>
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
                    <h6 class="text-white m-b-0">PERAWATAN</h6>
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
           <table class="table small table-hover table-bordered fixed_header">
             <thead>
               <tr>
                 <th></th>
                 <th>Kabupaten/Kota</th>
                 <th>ODP</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($odp as $item){?>
               <tr>
                  <td>
                    <img src="<?php echo base_url()?>assets/backend/images/kabkota/<?php echo $item->logo ?>" width="20px" />
                 </td>
                 <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
                 <td class="text-center"><label class="badge badge-primary"><?php echo $item->jumlah_odp ?></label></td>
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
           <table class="table small table-hover table-bordered">
             <thead>
               <tr>
                 <th></th>
                 <th>Kabupaten/Kota</th>
                 <th>PDP</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($pdp as $item){?>
               <tr>
                  <td>
                    <img src="<?php echo base_url()?>assets/backend/images/kabkota/<?php echo $item->logo ?>" width="20px" />
                 </td>
                 <td class="text-uppercase"><?php echo $item->nama_kab ?></td>
                 <td class="text-center"><label class="badge badge-primary"><?php echo $item->jumlah_pdp ?></label></td>
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
           <table class="table small table-hover table-bordered">
             <thead>
               <tr>
                 <th></th>
                 <th>Kabupaten/Kota</th>
                 <th>Suspect</th>
               </tr>
             </thead>
             <tbody>
               <?php
               $no = 1; 
               foreach($sus as $pos){?>
               <tr>
                 <td>
                    <a href="#viewsuspectkabkota" data-id="<?php echo $pos->id_kabupaten ?>" data-toggle="modal" title="Get Data"><img src="<?php echo base_url()?>assets/backend/images/kabkota/<?php echo $pos->logo ?>" width="20px" /></a>
                 </td>
                 <td class="text-uppercase"><?php echo $pos->nama_kab ?></td>
                 <td class="text-center"><label class="badge badge-primary"><?php echo $pos->jumlah_suspect ?></label></td>
               </tr>
               <?php } ?>
             </tbody>
           </table>
        </div>
      </div>
      </div>
    </div>
</div>

<div class="modal fade" id="viewsuspectkabkota" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
              <div class="v_suspect">
                
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect btn-sm " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $('#viewsuspectkabkota').on('show.bs.modal', function (e) {
        var idkabupaten = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'POST',
            url : '<?php echo base_url();?>dashboard/get_suspect_kabkota/'+idkabupaten,
            data :  'idkabupaten='+ idkabupaten,
            success : function(data){
            $('.v_suspect').html(data);
            }
        });
    });
  });
</script>
