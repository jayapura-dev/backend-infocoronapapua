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
              <li class="breadcrumb-item"><a href="#!">Data ODP</a>
              </li>
              <li class="breadcrumb-item"><a href="#!">Hapus Item</a>
              </li>
          </ul>
        </div>
    </div>
  </div>
</div>

<div class="page-body">
  <div class="card">
    <div class="card-header">
       <i class="icofont icofont-trash"></i><strong> HAPUS ITEM !!  </strong>
    </div>
    <div class="card-block">
        <strong>Peringatan!</strong> <code>APAKAH ANDA YAKIN INGIN MENGHAPUS ITEM INI ?</code><br/>
        <br/>
        <form method=post action="<?php echo base_url()?>Odp/user_delete_odp_post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
               <input type="hidden" name="id_odp" value="<?php echo $detail['id_odp'] ?>" class="form-control">
               <input type="text" name="nama" value="<?php echo $detail['nama'] ?>" class="form-control" readonly="true">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                <a href="<?php echo base_url()?>Odp/user_data_odp" class="btn btn-inverse btn-sm"> Batal</a> 
              </div>
           </div>
        </form>
    </div>
  </div>
</div>