<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Pengguna</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Pengguna</h3>
                <div class="float-right">
                    <a href="<?=site_url('user')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 <?=form_error('username') ? 'has-error' :null?>">
                                    <label for=""> Username *</label>
                                    <input type="text" value="<?=set_value('username') ?>" name="username" id="" class="form-control">
                                    <?=form_error('username') ?>
                                </div>
                                <div class="form-group col-md-6 <?=form_error('fullname') ? 'has-error' :null?>">
                                    <label for=""> Nama *</label>
                                    <input type="text" value="<?=set_value('fullname') ?>" name="fullname" id="" class="form-control">
                                    <?=form_error('fullname') ?>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 <?=form_error('password') ? 'has-error' :null?>">
                                    <label for=""> Password *</label>
                                    <input type="password" name="password" id="" class="form-control">
                                    <?=form_error('password') ?>
                                </div>
                                <div class="form-group col-md-6 <?=form_error('passconf') ? 'has-error' :null?>">
                                    <label for=""> Konfirmasi Password *</label>
                                    <input type="password" name="passconf" id="" class="form-control">
                                    <?=form_error('passconf') ?>
                                </div>
                            </div>
                            <div class="row col-md-12">
                            <div class="form-group col-md-6 <?=form_error('alamat') ? 'has-error' :null?>">
                                <label for=""> Alamat </label>
                                <textarea name="alamat" id="" cols="5" rows="5" class="form-control"><?=set_value('alamat') ?></textarea>
                                <?=form_error('alamat') ?>
                            </div>
                            <div class="form-group col-md-6 <?=form_error('no_telp') ? 'has-error' :null?>">
                            <div class="form-group">
                                <label for=""> Telepon/HP *</label>
                                <input type="text" value="<?=set_value('no_telp') ?>" name="no_telp" id="" class="form-control">
                                <?=form_error('no_telp') ?>
                            </div>
                            <div class="form-group <?=form_error('level') ? 'has-error' :null?>">
                                <label for=""> Level *</label>
                                <select value="<?=set_value('level') ?>" name="level" id="" class="form-control">
                                    <option value="">>= Pilih =<</option>
                                    <option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
                                    <option value="2" <?=set_value('level') == 1 ? "selected" : null?>>Kasir</option>
                                </select>
                                <?=form_error('level') ?>
                            </div>
                            </div>
                            <div class="form-group">
                                    <label for="gambar"> Foto </label>
                                    <input type="file" name="gambar" id="" class="form-control">
                                </div>
                        </div>
                            <div class="form-group float-right">
                                <button type="reset" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i> reset</button>
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>