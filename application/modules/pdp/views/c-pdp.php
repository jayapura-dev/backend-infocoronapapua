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
                  <li class="breadcrumb-item"><a href="#!">Data PDP</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">Tambah PDP</a>
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
            <h5><i class="icofont icofont-notepad"></i> Form Pengisian Data PDP</h5>
         </div>
         <div class="card-block">
           <h4 class="sub-title">Input Form</h4>
           <form method="post" action="<?php echo base_url()?>Pdp/create_pdp_post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Gender</label>
                 <div class="col-sm-10">
                    <select name="gender" class="form-control">
                      <option value="L">Laki - Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                 </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                  <input type="text" name="umur" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control max-textarea" name="alamat" maxlength="255" rows="4"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                  <input type="text" name="kontak" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kab/Kota</label>
                <div class="col-sm-10">
                <select name="id_kabupaten" class="form-control">
                    <option value="L">-- pilih --</option>
                    <?php
                    foreach($kabupatenlist as $p => $val){?>        
                    <option value="<?php echo $val->id_kabupaten;?>"><?php echo $val->nama_kab; ?></option>
                    <?php }?>
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rumah Sakit</label>
                <div class="col-sm-10">
                <select name="id_rs" class="form-control">
                    <option value="L">-- pilih --</option>
                    <?php
                    foreach($rslist as $p => $val){?>        
                    <option value="<?php echo $val->id_rs;?>"><?php echo $val->rumah_sakit; ?></option>
                    <?php }?>
                    <input type="hidden" name="date_created" value="<?php echo date('Y-m-d') ?>" class="form-control">
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                  <a href="<?php echo base_url()?>Odp/data_odp" class="btn btn-inverse btn-sm"> Batal</a> 
                </div>
              </div>
           </form>
         </div>
       </div>
    </div>
  </div>
</div>