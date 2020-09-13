<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Retur</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>dashboard/#">Home</a></li>
              <li class="breadcrumb-item active">Retur</li>
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
                <h3 class="card-title">Data Retur</h3>
                <div class="float-right">
                    <a href="<?=site_url('retur/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No Retur</th>
                            <th>Nama Pembeli</th>
                            <th>No Faktur</th>
                            <th>Nama Barang</th>
                            <!-- <th>Qty Jual</th>
                            <th>Harga Jual</th> -->
                            <th>Qty Retur</th>
                            <th>Denda Retur</th>
                            <th>Total Retur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                    <?php $no=1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$data->tgl_retur?></td>
                            <td><?=$data->no_retur?></td>
                            <td><?=$data->nama_customer?></td>
                            <td><?=$data->no_fakt?></td>
                            <td><?=$data->nama_barang?></td>
                            <!-- <td><?=$data->qty_jual?></td>
                            <td><?=$data->harga_jual?></td> -->
                            <td><?=$data->qty_retur?></td>
                            <td><?=$data->denda?>%</td>
                            <td><?=$data->total_retur?></td>
                            <td align="center" width="140px">
                                <!-- <a href="<?=site_url('retur/edit/'.$data->id_kategori)?>"  class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i> Edit</a> -->
                                <a href="<?=site_url('retur/cetak/'.$data->id_retur)?>" target="_blank" class="btn btn-secondary btn-xs">
                                <i class="fa fa-print"></i> Cetak</a>
                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?=site_url('retur/del/'.$data->id_retur)?>')" class="btn btn-danger btn-xs">
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