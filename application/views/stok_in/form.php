<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stock In
				<small>Barang Masuk / Pembelian</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Stock In</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"> Data Stock In</h3>
                <div class="float-right">
                    <a href="<?=site_url('kategori')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="<?=site_url('stok/proses') ?>" method="post">
                                <div class="form-group">
                                    <label for=""> Date *</label>
                                    <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required> 
                                </div>
                                <div>
                                    <label for=""> Barcode *</label>
                                </div>
                                <div class="form-group input-group">
                                    
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="text" name="barcode" id='barcode' class="form-control" required> 
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#m">
                                            <i class="fa fa-search"> </i>
                                        </button>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for=""> Nama Barang *</label>
                                    <input type="text" name="nama" id="nama" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="nama_unit">Unit Barang</label>
                                            <input type="text" name="nama_unit" id="nama_unit" value="-" class="form-control" readonly>
                                        </div>
                                        <DIV class="col-md-4">
                                            <label for="">inisial stok</label>
                                            <input type="text" name="stok" id="stok" value="-" class="form-control" readonly>
                                        </DIV>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""> Detail *</label>
                                    <input type="text" name="detail" class="form-control" placeholder="Kulakan / tambahan / etc" required> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Supplier </label>
                                    <select name="supplier" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <?php foreach($supplier as $i => $data) {
                                            echo '<option value="'.$data->id_supplier.'">'.$data->nama.'</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""> qty *</label>
                                    <input type="number" name="qty" class="form-control" required> 
                                </div>
                        
                            <div class="form-group float-right">
                                <button type="reset" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i> reset</button>
                                <button type="submit" name="in_add" class="btn btn-info">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="modal fade" id="m">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Produk Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-striped" id="table1" style="width: 100%;" > 
                    <thead>
                        <tr>
                            <td>Barcode</td>
                            <td>Nama</td>
                            <td>Harga</td>
                            <td>Stok</td>
                            <td>Actions</td> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($barang as $i => $data) { ?>
                        <tr>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->nama?></td>
                            <td class="text-right"><?=rp($data->harga)?></td>
                            <td class="text-right"><?=$data->stok?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="btn_pilih"
                                data-id="<?=$data->id_barang?>"
                                data-barcode="<?=$data->barcode?>"
                                data-nama="<?=$data->nama?>"
                                data-unit="<?=$data->nama_unit?>"
                                data-stok="<?=$data->stok?>">
                                    <i class="fa fa-check"></i> Pilih
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>