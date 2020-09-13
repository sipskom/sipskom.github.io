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
                <h3 class="card-title">Edit Data Pengguna</h3>
                <div class="float-right">
                    <a href="<?=site_url('user')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-12">
                        <form action="" enctype="multipart/form-data" accept-charset="utf-8" method="post">
                            <div class="form-group" width="100%">
                                <table width="100%">
                                    <td width="35%"></td>
                                    <td width="40%">
                                    <?php
                                        if($row->gambar != null) { ?>
                                        <div style="margin-bottom: 5px;"> 
                                        <img src="<?=base_url('uploads/userphoto/'.$row->gambar) ?>" style="height: 260px; width: 240px;">
                                        </div>
                                        <?php
                                        } ?>
                                    </td>
                                    <td width="25%"></td>
                                </table>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 <?=form_error('username') ? 'has-error' :null?>">
                                    <input type="hidden" name="id_user" value="<?=$row->id_user?>">
                                    <label for=""> Username *</label>
                                    <input type="text" value="<?=$this->input->post('username') ?? $row->username ?>" name="username" id="" class="form-control">
                                    <?=form_error('username') ?>
                                </div>
                                <div class="form-group col-md-6 <?=form_error('fullname') ? 'has-error' :null?>">
                                    <label for=""> Nama *</label>
                                    <input type="text" value="<?=$this->input->post('fullname') ?? $row->nama ?>" name="fullname" id="" class="form-control">
                                    <?=form_error('fullname') ?>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-6 <?=form_error('password') ? 'has-error' :null?>">
                                    <label for=""> Password</label><small>(Biarkan kosong jika tidak diganti)</small>
                                    <input type="password" name="password" value="<?=$this->input->post('password')?>" id="" class="form-control">
                                    <?=form_error('password') ?>
                                </div>
                                <div class="form-group col-md-6 <?=form_error('passconf') ? 'has-error' :null?>">
                                    <label for=""> Konfirmasi Password</label>
                                    <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" id="" class="form-control">
                                    <?=form_error('passconf') ?>
                                </div>
                            </div>
                            <div class="row col-md-12">
                            <div class="form-group col-md-6 <?=form_error('alamat') ? 'has-error' :null?>">
                                <label for=""> Alamat </label>
                                <textarea name="alamat" id="" cols="5" rows="5" class="form-control"><?=$this->input->post('alamat') ?? $row->alamat ?></textarea>
                                <?=form_error('alamat') ?>
                            </div>
                            <div class="form-group col-md-6 <?=form_error('no_telp') ? 'has-error' :null?>">
                            <div class="form-group">
                                <label for=""> Telepon/HP *</label>
                                <input type="text" value="<?=$this->input->post('no_telp') ?? $row->no_telp ?>" name="no_telp" id="" class="form-control">
                                <?=form_error('no_telp') ?>
                            </div>
                            <div class="form-group <?=form_error('level') ? 'has-error' :null?>">
                                <label for=""> Level </label>
                                <select name="level" id="" class="form-control">
                                    <?php $level= $this->input->post('level') ? $this->input->post('level') : $row->level?>
                                    <option value="1">Admin</option>
                                    <option value="2" <?=$level == 2 ? 'selected' : null?>>Kasir</option>
                                </select>
                                <?=form_error('level') ?>
                            </div>
                            </div>
                            <div class="form-group">
                                    <label for=""> Foto </label>
                                    <input type="file" name="gambar" id="" class="form-control"> 
                                    <small>(Biarkan Kosong Jika Tidak Dirubah.)</small>
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