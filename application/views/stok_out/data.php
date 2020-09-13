<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Barang Keluar</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Barang keluar</li>
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
                <h3 class="card-title">Data Barang Keluar</h3>
                <div class="float-right">
                    <a href="<?=site_url('stok/out/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Detail</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                    <?php $no=1;
                        foreach($row as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td align="center"><?=$data->barcode?></td>
                            <td><?=$data->nama?></td>
                            <td class="text-center"><?=$data->qty?></td>
                            <td><?=$data->detail?></td>
                            <td align="center"><?=indo_date($data->date)?></td>
                            <td align="center" width="140px">
                                <a href="<?=site_url('stok/out/del/'.$data->id_stok.'/'.$data->id_barang)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>