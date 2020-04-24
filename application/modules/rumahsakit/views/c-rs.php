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
                  <li class="breadcrumb-item"><a href="#!">Rumah Sakit</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">Tambah Rrumah Sakit</a>
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
            <h5><i class="icofont icofont-notepad"></i> Form Pengisian Data Rumah Sakit</h5>
         </div>
         <div class="card-block">
           <h4 class="sub-title">Input Form</h4>
           <form method=post action="<?php echo base_url()?>Rumahsakit/post_create_rs">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama RS</label>
                <div class="col-sm-10">
                  <input type="text" name="rumah_sakit" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                 <label class="col-sm-2 col-form-label">status</label>
                 <div class="col-sm-10">
                    <select name="status_rs" class="form-control">
                      <option value="rujukan">Rujukan</option>
                      <option value="tidak">Tidak</option>
                    </select>
                 </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lat</label>
                <div class="col-sm-10">
                  <input type="text" name="lat" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lon</label>
                <div class="col-sm-10">
                  <input type="text" name="lon" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control max-textarea" name="alamat_rs" maxlength="255" rows="4"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                  <input type="text" name="no_telfon" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kab/Kota</label>
                <div class="col-sm-10">
                <select name="id_kabupaten" class="form-control">
                    <option value="0">-- pilih --</option>
                    <?php
                    foreach($kabupatenlist as $p => $val){?>        
                    <option value="<?php echo $val->id_kabupaten;?>"><?php echo $val->nama_kab; ?></option>
                    <?php }?>
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
                  <a href="<?php echo base_url()?>Rumahsakit" class="btn btn-inverse btn-sm"> Batal</a> 
                </div>
              </div>
           </form>
         </div>
       </div>
    </div>
  </div>
</div>