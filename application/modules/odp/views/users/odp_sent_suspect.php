<form method="post" action="<?php echo base_url()?>Odp/user_suspect_post_from_odp">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         <input type="hidden" name="id_odp" id="sidodp" />
         <input type="text" name="nama" id="snama" class="form-control" readonly="true" />
         <input type="hidden" name="gender" id="sgender" />
         <input type="hidden" name="umur" id="sumur" />
         <input type="hidden" name="id_kabupaten" id="sidkabupaten" />
         <input type="hidden" name="alamat" id="salamat" />
         <input type="hidden" name="kontak" id="skontak" />
         <input type="hidden" name="is_from" class="form-control" value="odp send" />
         <input type="hidden" name="status" class="form-control" value="POSITIF" />
         <input type="hidden" name="date_created" value="<?php echo date('Y-m-d') ?>" />
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Rumah Sakit</label>
      <div class="col-sm-10">
        <select name="id_rs" class="form-control">
          <option value="0">-- pilih --</option>
          <?php
          foreach($rslist as $p => $val){?>        
          <option value="<?php echo $val->id_rs;?>"><?php echo $val->rumah_sakit; ?></option>
          <?php }?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <input type="submit" class="btn btn-primary btn-sm" value="Kirim" />
      </div>
    </div>
</form>