<script src="<?php echo base_url()?>assets\backend\js\jquery-1.11.3.min.js"></script>

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
                  <li class="breadcrumb-item"><a href="#!">Users</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!">Tambah Users</a>
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
            <h5><i class="icofont icofont-notepad"></i> Form Pengisian Data</h5>
         </div>
         <div class="card-block">
           <h4 class="sub-title">Input Form</h4>
           <form method=post action="<?php echo base_url()?>Users/create_user_post">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_lengkap" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" name="sandi" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" name="email" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                <input type="text" name="kontak" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-5">
                    <select name="status" class="form-control">
                      <option value="aktif">Aktif</option>
                      <option value="blok">Block</option>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-5">
                  <select name="level" class="form-control" id="xlevel">
                      <option value="0">-- pilih --</option>
                      <?php
                      foreach($level as $p => $val){?>        
                      <option value="<?php echo $val->id_level;?>"><?php echo $val->level; ?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="col-sm-5" id="xidkabupaten" hidden="true">
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
                  <a href="<?php echo base_url()?>Odp/data_odp" class="btn btn-inverse btn-sm"> Batal</a> 
                </div>
              </div>
           </form>
         </div>
       </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#xlevel').change(function() {
    var level = $(this).val();
    $('#xidkabupaten').prop('hidden', level != '2');
  });
</script>