<form method="post" action="<?php echo base_url()?>Pdp/update_pdp_post">
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" name="nama" id="unama" class="form-control">
        <input type="hidden" name="id_pdp" id="uid" class="form-control">
    </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
        <select name="gender" class="form-control" id="ugender">
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
        </select>
        </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Umur</label>
    <div class="col-sm-10">
        <input type="text" name="umur" class="form-control" id="uumur">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
        <textarea class="form-control max-textarea" id="ualamat" name="alamat" maxlength="255" rows="4"></textarea>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kontak</label>
    <div class="col-sm-10">
        <input type="text" name="kontak" class="form-control" id="ukontak">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kab/Kota</label>
    <div class="col-sm-10">
        <select name="id_kabupaten" class="form-control" id="uidkabupaten">
            <option value="0">-- pilih --</option>
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
    <select name="id_rs" class="form-control" id="uidrs">
        <option value="0">-- pilih --</option>
        <?php
        foreach($rslist as $p => $val){?>        
        <option value="<?php echo $val->id_rs;?>"><?php echo $val->rumah_sakit; ?></option>
        <?php }?>
        <input type="hidden" name="date_created" id="datecreated" class="form-control">
        <input type="hidden" name="is_from" id="uisfrom" class="form-control">
    </select>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
        <input type="submit" class="btn btn-primary btn-sm" value="Update" />
    </div>
    </div>
</form>