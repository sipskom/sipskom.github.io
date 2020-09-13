<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Retur</small>
			</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Retur</li>
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
                <h3 class="card-title"><?=$page?> Data Retur</h3>
                <div class="float-right">
                    <a href="<?=site_url('retur')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <form action="<?=site_url('retur/proses') ?>" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->id_retur ?>">
                                    <label for=""> Nomor Retur </label>
                                    <input type="text" value="<?=$no_ret ?>" name="no_retur" id="no_retur" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Tanggal *</label>
                                    <input type="date" name="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""> Nomor Faktur </label>
                                    <div class="input-group">
                                    <input type="text" name="no_faktur" id="no_faktur" class="form-control" value="<?=$row->no_faktur?>" readonly> 
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#m">
                                            <i class="fa fa-search"> </i>
                                        </button>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""> Pembeli </label>
                                    <input type="text" value="" name="nama_customer" id="nama_customer" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Nama Barang </label>
                                    <input type="text" value="" name="nama_barang" id="nama_barang" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Qty Jual </label>
                                    <input type="text" value="" name="qtyjual" id="qtyjual" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Harga Jual </label>
                                    <input type="text" value="" name="harga_jual" id="harga_jual" class="form-control" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Qty Retur</label>
                                    <input type="number" value="<?= $row->qty_retur?>" name="qty" id="qty" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label for=""> Denda Retur (%) </label>
                                    <div class="input-group">
                                    <input type="number" value="<?= $row->denda?>" name="denda" id="denda" class="form-control">
                                    <h4 style="margin-top: 3pt;"><b>%</b></h4> </div>
                                </div>
                                <div class="form-group">
                                    <label for=""> Total </label>
                                    <input type="text" value="<?= $row->total_retur?>" name="total_retur" id="total_retur" class="form-control" readonly> 
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


    <div class="modal fade" id="m">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Faktur Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-striped" id="table1" style="width: 100%;" > 
                    <thead>
                        <tr>
                            <td>Tanggal</td>
                            <td>Nomor Faktur</td>
                            <td>Pembeli</td>
                            <td>Nama Barang</td>
                            <td>Qty</td> 
                            <td>Total</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($faktur as $i => $data) { ?>
                        <tr>
                            <td><?=$data->date?></td>
                            <td><?=$data->no_faktur?></td>
                            <td><?=$data->nama_customer?></td>
                            <td><?=$data->nama_barang?></td>
                            <td><?=$data->qty_jual?></td>
                            <td><?=$data->total_jual?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="btn_select"
                                data-id="<?=$data->id_penjualan?>"
                                data-nofaktur="<?=$data->no_faktur?>"
                                data-namacust="<?=$data->nama_customer?>"
                                data-namabar="<?=$data->nama_barang?>"
                                data-qtyjual="<?=$data->qty_jual?>"
                                data-hrgjual="<?=$data->total_jual?>">
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

<script>
    $(document).ready(function(){
        $(document).on('click', '#btn_select', function(){
      $('#no_faktur').val($(this).data('nofaktur'));
      $('#nama_customer').val($(this).data('namacust'));
      $('#nama_barang').val($(this).data('namabar'));
      $('#qtyjual').val($(this).data('qtyjual'));
      $('#harga_jual').val($(this).data('hrgjual'));
      $('#m').modal('hide');
    });
    });

    function count_edit_modal() {
		var hrg = $('#harga_jual').val();
		var denda = $('#denda').val();
        var qtyjual = $('#qtyjual').val();
        var qty = $('#qty').val();

        a = (hrg / qtyjual) * qty;
        min = (a * denda) / 100;
		total = a - min;
		$('#total_retur').val(total);

	};

	$(document).on('keyup mouseup', '#harga_jual, #denda','qty', function() {
		count_edit_modal();
	});
</script>