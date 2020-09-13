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
        <div class="card card-indigo card-outline">
            <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
                <div class="float-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon/HP</th>
                            <th>level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                        <?php $no=1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td>
                                <?php if($data->gambar != null) { ?>
                                <img src="<?=base_url('uploads/userphoto/'.$data->gambar) ?>" style="width:100px">
                                <?php }?>
                            </td>
                            <td><?=$data->username?></td>
                            <td><?=$data->nama?></td>   
                            <td><?=$data->alamat?></td>
                            <td align="center"><?=$data->no_telp?></td>
                            <td align="center"><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
                            <td align="center" width="140px">
                                <form action="<?=site_url('user/del')?>" method="post">
                                <a href="<?=site_url('user/edit/'.$data->id_user)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i> Edit</a>
                                <input type="hidden" name="id_user" value="<?=$data->id_user?>">
                                <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>