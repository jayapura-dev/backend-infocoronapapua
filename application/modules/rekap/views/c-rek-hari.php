<?php foreach($suspect as $i){
    $confirm = $i->confirm;
    $positif = $i->positif;
    $sembuh = $i->sembuh;
    $meninggal = $i->meninggal;
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
                  <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Dashboard</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Rekap</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Tambah Rekap Hari</a>
              </li>
          </ul>
        </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="row">
    <div class="col-sm-12">
       <div class="card">
         <div class="card-header">
            <h5><i class="icofont icofont-notepad"></i> Form Pengisian Data ODP</h5>
         </div>
         <div class="card-block">
           <h4 class="sub-title">Input Form</h4>
           <form method=post action="<?php echo base_url()?>Rekap/create_rekap_hari_post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="text" name="tanggal" value="<?php echo date('Y-m-d') ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah ODP</label>
                <div class="col-sm-10">
                  <input type="text" name="odp" value="<?php echo $odp['jumlah_odp'] ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah PDP</label>
                <div class="col-sm-10">
                  <input type="text" name="pdp" value="<?php echo $pdp['jumlah_pdp'] ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Terkonfirmasi</label>
                <div class="col-sm-10">
                  <input type="text" name="confirm" value="<?php echo $confirm ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Positif</label>
                <div class="col-sm-10">
                  <input type="text" name="positif" value="<?php echo $positif ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Sembuh</label>
                <div class="col-sm-10">
                  <input type="text" name="sembuh" value="<?php echo $sembuh ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Meninggal</label>
                <div class="col-sm-10">
                  <input type="text" name="meninggal" value="<?php echo $meninggal ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">P Positif</label>
                <div class="col-sm-10">
                  <input type="text" name="p_positif" value="<?php echo number_format($p_positif,2) ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">P Sembuh</label>
                <div class="col-sm-10">
                  <input type="text" name="p_sembuh" value="<?php echo number_format($p_sembuh,2) ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">P Meninggal</label>
                <div class="col-sm-10">
                  <input type="text" name="p_meninggal" value="<?php echo number_format($p_meninggal,2) ?>" readonly="true" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                  <a href="<?php echo base_url()?>Rekap/rekap_hari" class="btn btn-inverse btn-sm"> Batal</a> 
                </div>
              </div>
           </form>
         </div>
       </div>
    </div>
  </div>
</div>