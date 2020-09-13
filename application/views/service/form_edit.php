<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Service</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-<?=$warna?> card-outline">
            <div class="card-header">
                <h3 class="card-title"><?=$page?> Data Service</h3>
                <div class="float-right">
                    <a href="<?=site_url('Service')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-8 offset-md-3">
                        <form action="<?=site_url('service/proses') ?>" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->id_service?>">
                                    <label for=""> Nomor Service </label>
                                    <input type="text" value="<?=$row->no_service?>" name="no_service" id="no_service" class="form-control" readonly> 
                                </div>
                                <div class="form-group" style="margin-left: 50px;">
                                    <label for=""> Pelanggan </label>
                                    <select disabled style="width: 210px;" id="id_customer" name="id_customer" class="form-control">
                                       <option value="<?=$row->id_customer?>"><?=$row->nama?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for=""> Kategori </label>
                                    <select disabled style="width: 210px;" name="kategori" id="kategori" class="form-control">
                                    <option value="<?=$row->kategori?>"><?=$row->kategori?></option>
                                    </select>
                                </div>
                                <div class="form-group" style="margin-left: 50px;">
                                    <label for=""> Barang </label>
                                    <input type="text" value="<?=$row->nama_barang?>" name="nama_barang" id="nama_barang" class="form-control" readonly> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for=""> Kelengkapan </label>
                                    <textarea name="kelengkapan" id="kelengkapan" cols="23" rows="2" class="form-control" readonly><?=$row->kelengkapan?></textarea>
                                </div>
                                <div class="form-group" style="margin-left: 50px;">
                                    <label for=""> Keluhan </label>
                                    <textarea name="keluhan" id="keluhan" cols="23" rows="2" class="form-control" readonly><?=$row->keluhan?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for=""> Kerusakan </label>
                                    <textarea name="kerusakan" id="kerusakan" cols="23" rows="2" class="form-control"><?=$row->kerusakan?></textarea>
                                </div>
                                <div class="form-group" style="margin-left: 50px;">
                                    <label for=""> Sparepart </label>
                                    <textarea name="sparepart" id="sparepart" cols="23" rows="2" class="form-control"><?=$row->sparepart?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for=""> Biaya Service </label>
                                    <input type="number" value="<?=$row->biaya_service?>" name="biaya_service" id="biaya_service" class="form-control" required> 
                                </div>
                                <div class="form-group" style="margin-left: 50px;">
                                    <label for=""> Uang Muka </label>
                                    <input type="number" value="<?=$row->dp?>" name="dp" id="dp" class="form-control" readonly> 
                                </div>
                            </div>
                        
                            <div class="form-group float-right">
                                <button type="reset" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i> reset</button>
                                <button type="submit" name="<?=$page?>" class="btn btn-info">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>