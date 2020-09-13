<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Barang</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
                <h3 class="card-title">Data Barang</h3>
                <div class="float-right">
                    <a href="<?=site_url('barang/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
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
                                <img src="<?=base_url('uploads/barang/'.$data->gambar) ?>" style="width:100px">
                                <?php }?>
                            </td>
                            <td>
                                <?=$data->barcode?><br>
                                <a style="float: right;" href="<?=site_url('barang/barcode/'.$data->id_barang)?>"  class="btn btn-default btn-xs">
                                Generate <i class="fa fa-barcode"></i></a>
                            </td>
                            <td><?=$data->nama?></td>
                            <td><?=$data->nama_kategori?></td>
                            <td><?=rp($data->harga)?></td>
                            <td><?=$data->stok?></td>
                            <td align="center" width="140px">
                                <a id="detail_barang" class="btn btn-default btn-xs" data-toggle="modal" data-target="#dtl"
                                data-gambar="<?=$data->gambar?>"
                                data-barcode="<?=$data->barcode?>"
                                data-namabar="<?=$data->nama?>"
                                data-namakat="<?=$data->nama_kategori?>"
                                data-detail="<?=$data->detail?>"
                                data-stok="<?=$data->stok?>"
                                data-harga="<?=rp($data->harga)?>">
                                <i class="fa fa-eye"></i> </a>
                                <a href="<?=site_url('barang/edit/'.$data->id_barang)?>"  class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i> </a>
                                <a href="<?=site_url('barang/del/'.$data->id_barang)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="dtl">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Barang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive">
                <div align="center" style="margin-top: -20px;">    
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
                            <th >Kategori</th>
                            <td><span id="nama_kategori"></span></td>
                        </tr>
                        <tr>
                            <th >Stock</th>
                            <td><span id="stok"></span></td>
                        </tr>
                        <tr>
                            <th >Harga</th>
                            <td><span id="harga"> </span></td>
                        </tr>
                        <tr>
                            <th >Detail</th>
                            <td><textarea id="detail" class="form-control" style="width: 310px;" cols="100" rows="17" readonly></textarea></td>
                        </tr>
                    </tbody>        
                </table>
            </div>
            <div class="modal-footer justify-content-between">

            </div>
          </div>
        </div>
      </div>