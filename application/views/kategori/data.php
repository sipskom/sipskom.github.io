<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Kategori</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Data Kategori</h3>
                <div class="float-right">
                    <a href="<?=site_url('kategori/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                        <?php $no=1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$data->nama?></td>
                            <td align="center" width="140px">
                                <a href="<?=site_url('kategori/edit/'.$data->id_kategori)?>"  class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i> Edit</a>
                                <!-- <a href="<?=site_url('kategori/del/'.$data->id_kategori)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a> -->
                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?=site_url('kategori/del/'.$data->id_kategori)?>')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Peringatan!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body justify-content-between">
              <p>Yakin Mau Mau Menghapus Data Ini?&hellip;</p>
              
            </div>
            <div class="">
            <form class="modal-footer justify-content-between" id="formDelete" action="" method="post">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-outline-light">Hapus</button>
            </form>
            </div>
          </div>
        </div>
      </div>