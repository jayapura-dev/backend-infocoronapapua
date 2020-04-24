<form method="post" action="<?php echo base_url()?>Pdp/suspect_post_from_pdp">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
         <input type="hidden" name="id_pdp" id="sid" />
         <input type="text" name="nama" id="snama" class="form-control" />
         <input type="hidden" name="gender" id="sgender" />
         <input type="hidden" name="umur" id="sumur" />
         <input type="hidden" name="alamat" id="salamat" />
         <input type="hidden" name="kontak" id="skontak" />
         <input type="hidden" name="id_kabupaten" id="sidkabupaten" />
         <input type="hidden" name="id_rs" id="sidrs" />
         <input type="hidden" name="is_from" class="form-control" value="PDP SEND" />
         <input type="hidden" name="status" class="form-control" value="POSITIF" />
         <input type="hidden" name="date_created" value="<?php echo date('Y-m-d') ?>" />
      </div>
    </div>
    
    <div class="form-group row">
      <label class="col-sm-2 col-form-label"></label>
      <div class="col-sm-10">
         <input type="submit" class="btn btn-primary btn-sm" value="Simpan" />
      </div>
    </div>
</form>