<form>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         <input type="text" name="nama" id="snama" class="form-control">
         <input type="hidden" name="gender" id="sgender" class="form-control">
         <input type="hidden" name="umur" id="sumur" class="form-control">
         <input type="hidden" name="id_kabupaten" id="sidkabupaten" class="form-control">
         <input type="hidden" name="alamat" id="salamat" class="form-control">
         <input type="hidden" name="kontak" id="skontak" class="form-control">
         <input type="hidden" name="date_created" value="<?php echo date('Y-m-d') ?>"  class="form-control">
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