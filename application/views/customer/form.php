<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Customers</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3 class="card-title"><?=$page?> Data customer</h3>
                <div class="float-right">
                    <a href="<?=site_url('customer')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?=site_url('customer/proses') ?>" method="post">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 ">
                                    <input type="hidden" name="id" value="<?=$row->id_customer ?>" required>
                                    <label for=""> Nama Customer *</label>
                                    <input type="text" value="<?=$row->nama ?>" name="nama" id="" class="form-control" required> 
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for=""> Jenis Kelamin *</label>
                                    <select name="jk" class="form-control" required>
                                        <option value="">** Pilih **</option>
                                        <option value="L" <?=$row->jk == 'L' ? 'selected' : null?>>Laki-Laki</option>
                                        <option value="P" <?=$row->jk == 'P' ? 'selected' : null?>>Perempuan</option>
                                    </select>
                                
                                </div>

                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 ">
                                    <label for=""> Alamat *</label>
                                    <textarea name="alamat" id="" cols="30" rows="3" class="form-control" required><?=$row->alamat ?></textarea>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for=""> Telepon/HP *</label>
                                    <input type="number" value="<?=$row->no_telp ?>" name="no_telp" id="" class="form-control" required> 
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