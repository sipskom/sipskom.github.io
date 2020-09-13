<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Barang Masuk</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Barang Masuk</li>
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
                <h3 class="card-title">Data Barang Masuk</h3>
                <div class="float-right">
                    <a href="<?=site_url('stok/in/add')?>" class="btn btn-primary">
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
                            <td><?=$data->nama_barang?></td>
                            <td class="text-center"><?=$data->qty?></td>
                            <td align="center"><?=indo_date($data->date)?></td>
                            <td align="center" width="140px">
                                <a class="btn btn-default btn-xs" id="dtl_stok_in" data-toggle="modal" data-target="#dtl"
                                data-barcode="<?=$data->barcode?>"
                                data-namabarang="<?=$data->nama_barang?>"
                                data-namasupp="<?=$data->nama_supplier?>"
                                data-detail="<?=$data->detail?>"
                                data-qty="<?=$data->qty?>"
                                data-date="<?=indo_date($data->date)?>">
                                <i class="fa fa-eye"></i> Detail</a>
                                <a href="<?=site_url('stok/in/del/'.$data->id_stok.'/'.$data->id_barang)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dtl">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div align="center" style="margin-top: -20px;">
                        <?php if($data->gambar != null) { ?>
                        <img src="<?=base_url('uploads/barang/'.$data->gambar) ?>" style="width: 50%">
                        <?php }?>        
                </div>
                <table class="table no-padding">
                    <tbody>
                        <tr>
                            <th style="width: 180px;">Barcode</th>
                            <td><span id="barcode"></td>
                        </tr>
                        <tr>
                            <th >Nama Barang</th>
                            <td><span id="nama_barang"></span></td>
                        </tr>
                        <tr>
                            <th >Nama Supplier</th>
                            <td><span id="nama_supplier"></span></td>
                        </tr>
                        <tr>
                            <th >Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th >Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th >Tanggal</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>        
                </table>
            </div>
        </div>
    </div>
</div>