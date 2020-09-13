<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaksi
				<small>Penjualan</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Penjualan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top;">
                            <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                            <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->nama?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                            <label for="user">Pembeli</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="customer" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach($customer as $cust =>$value){
                                            echo'<option value="'.$value->id_customer.'">'.$value->nama.'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="info-box">
                <div class="info-box-content">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                            <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="id_barang">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stok">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-flat" data-toggle="modal" data-target="#mbarang">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div style="float: right;">
                                    <button type="button" id="add_cart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Tambah
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div align="right">
                        <h4>No. Faktur <b><span id="no_faktur"><?=$no_fakt?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size:35pt; color: teal">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Barcode</th>
                                <th class="text-center">Barang</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Diskon Barang</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $this->view('penjualan/cart_data')?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="diskon">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="diskon" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%;">
                                <label for="cash">Dibayarkan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                            <td width="2%"></td>
                            <td style="vertical-align: top;">
                                <label for="change">Kembalian</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">
                                <label for="note">Catatan</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <button style="width: 100%;" id="proses_payment" class="btn btn-flat btn-success">
                                    <i class="fa fa-paper-plane-o"></i>Proses Pembayaran
                                </button><br><br>
                                <button style="width: 100%;" id="cancel_payment" class="btn btn-flat btn-warning">
                                    <i class="fa fa-refresh"></i> Batalkan Pembayaran
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Produk Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1" style="width: 100%;" > 
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
                                <button class="btn btn-xs btn-info" id="pilih"
                                data-id="<?=$data->id_barang?>"
                                data-barcode="<?=$data->barcode?>"
                                data-harga="<?=$data->harga?>"
                                data-stok="<?=$data->stok?>">
                                <i class="fa fa-check"></i> Pilih</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Edit Product -->
<div class="modal fade" id="mbarang_edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title">Update Produk Barang </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

			<div class="modal-body table-responsive">
				<input type="hidden" id="cartid_item">
				<div class="form-group">
					<label for="product_item">Product Item</label>
					<input type="text" name="product_item" id="product_item" class="form-control" readonly>
                </div>
                <div class="row">
				<div class="form-group" style="width: 185px; margin-left: 7px">
					<label for="price_item">Price</label>
					<input type="number" name="price_item" id="price_item" min="0" class="form-control">
                </div>
				<div class="form-group" style="margin-left: 5px;">
					<label for="qty_item">Qty</label>
					<input type="number" name="qty_item" id="qty_item" min="1" class="form-control" style="width: 75px;">
                </div>
                </div>
				<div class="form-group">
					<label for="total_before">Total Before Discount</label>
					<input type="number" name="total_before" id="total_before" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="discount_item">Discount Per Item</label>
					<input type="number" name="discount_item" id="discount_item" min="0" class="form-control">
				</div>
				<div class="form-group">
					<label for="total_item">Total After Discount</label>
					<input type="number" name="total_item" id="total_item" min="0" class="form-control" readonly>
				</div>
			</div>
			<div class="modal-footer">
				<div class="pull-right">
					<button type="button" id="edit_cart" class="btn btn-primary">
						<i class="fa fa-save"> Simpan</i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).on('click', '#add_cart', function(){
      var id_barang = $('#id_barang').val();
      var harga = $('#harga').val();
      var stok = $('#stok').val();
      var qty = $('#qty').val();
      if(id_barang == ''){
        toastr.warning('Produk belum dipilih!');
        $('#barcode').focus();
      } else if(stok < 1){
        toastr.warning('Stok Tidak Mencukupi!');
        $('#id_barang').val('');
        $('#barcode').val('');
        $('#barcode').focus();
      } else {
        $.ajax({
          type : 'POST',
          url : '<?=site_url('penjualan/proses')?>',
          data : {'add_cart' : true, 'id_barang' : id_barang, 'harga' : harga, 'qty' : qty},
          dataType : 'json',
          success: function(result) {
					if (result.success = true) {
						$('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            toastr.info('Barang Ditambahkan Kedalam Keranjang!');
							calculate()
						})
                        $('#id_barang').val('');
                        $('#barcode').val('');
                        $('#qty').val('1');
                        $('#barcode').focus();
					} else {
                        toastr.error('Gagal Menambahkan Barang Kedalam Keranjang!');
					}
				}
        })
      }
    });

    $(document).on('click', '#del_cart', function(){
      if(confirm('Yakin Ingin Menghapus Data Ini?')){
        var idcart = $(this).data('idcart');
        $.ajax({
          type: 'POST',
          url: '<?=site_url('penjualan/cart_del')?>',
          dataType: 'json',
          data: {'id_keranjang': idcart},
          success: function(result){
            if(result.success = true) {
              $('#cart_table').load('<?=site_url('penjualan/cart_data')?>', function(){
                toastr.info('Berhasil Menghapus Barang Dari Keranjang!');  
              })
            } else {
              toastr.error('Gagal Menghapus Barang Dari Keranjang!');
            }
          }
        })
      }
    });
    $(document).ready(function() {
		$(document).on('click', '#update_cart', function() {
			$('#cartid_item').val($(this).data('idcart'));
			$('#product_item').val($(this).data('barang'));
			$('#price_item').val($(this).data('harga'));
			$('#qty_item').val($(this).data('qty'));
			$('#total_before').val($(this).data('harga') * $(this).data('qty'));
			$('#discount_item').val($(this).data('diskon'));
			$('#total_item').val($(this).data('total'));
		});
	});

    function count_edit_modal() {
		var price = $('#price_item').val();
		var qty = $('#qty_item').val();
		var discount = $('#discount_item').val();

		total_before = price * qty;
		$('#total_before').val(total_before);

		total = (price - discount) * qty;
		$('#total_item').val(total);

	};

	$(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
		count_edit_modal();
	});

    $(document).on('click', '#edit_cart', function() {
		var cart_id = $('#cartid_item').val()
		var price = $('#price_item').val()
		var qty = $('#qty_item').val()
		var discount = $('#discount_item').val()
		var total = $('#total_item').val()

		if (price == '') {
            toastr.warning('Harga Tidak Boleh Kosong!');
			$('#price_item').focus();
		} else if (qty == '' || qty < 1) {
            toastr.warning('Qty Tidak Boleh Kosong!');
			$('#qty_item').focus();
		} else {
			$.ajax({
				type: 'POST',
				url: '<?=site_url('penjualan/proses')?>',
				data: {
					'edit_cart': true,
					'cart_id': cart_id,
					'price': price,
					'qty': qty,
					'discount': discount,
					'total': total
				},
				dataType: 'json',
				success: function(result) {
					if (result.success == true) {
						$('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            toastr.info('Data Item Berhasil Di Update ke cart!');
							calculate()
						})
						$('#mbarang_edit').modal('hide');
					} else {
                        toastr.error('Data Item Cart Gagal di Update!');
					}
				}
			})
		}
	});

    function calculate() {
		var subtotal = 0;

		$('#cart_table tr').each(function() {
			subtotal += parseInt($(this).find('#total').text())
		})
		isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

		var diskon = $('#diskon').val()
		var grand_total = subtotal - diskon

		if (isNaN(grand_total)) {
			$('#grand_total').val(0)
			$('#grand_total2').text(0)
		} else {
			$('#grand_total').val(grand_total)
			$('#grand_total2').text(grand_total)
		}


		var cash = $('#cash').val();
		cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0);
	}

	$(document).on('keyup mouseup', '#diskon, #cash', function() {
		calculate();
	})

	$(document).ready(function() {
		calculate()
	});

    // fungsi proses pembayaran
    $(document).on('click', '#proses_payment', function()
    {
        var customer_id = $('#customer').val()
        var subtotal    = $('#sub_total').val()
        var diskon    = $('#diskon').val()
        var grandtotal  = $('#grand_total').val()
        var cash        = $('#cash').val()
        var change      = $('#change').val()
        var note        = $('#note').val()
        var date        = $('#date').val()

        if(subtotal < 1 )
        {
            toastr.warning('Belum ada Barang Yang di pilih')
            $('#barcode').focus()
        }
        else if(cash < 1)
        {
            toastr.warning('jumlah Uang yang Dibayarkan Belum Diinput!')
            $('#cash').focus()
        }
        else
        {
            if(confirm('Memproses Pembayaran Sekarang?'))
            {
                $.ajax({
                    type: 'POST',
                    url: '<?=site_url('penjualan/proses')?>',
                    data: {'process_payment': true, 'customer_id' : customer_id, 'subtotal' : subtotal, 'diskon' : diskon, 'grandtotal' : grandtotal, 'cash' : cash, 'change' :change, 'note' : note, 'date' : date},
                    dataType: 'json',
                    success: function(result)
                    {
                        if(result.success)
                        {
                            toastr.success('Proses Pembayaran Berhasil Dilakukan');
                            window.open('<?=site_url('penjualan/cetak/')?>'+result.id_penjualan, '_blank')
                        }
                        else
                        {
                            toastr.error('transaksi Gagal');
                        }
                        location.href='<?=site_url('penjualan')?>'
                    }
                })
            }
        }
    });

    $(document).on('click', '#cancel_payment', function(){
        if(confirm('Yakin Ingin Membatalkan Proses?')){
            $.ajax({
                type: 'POST',
                url: '<?=site_url('penjualan/cart_del')?>',
                data: {'cancel_payment': true},
                dataType: 'json',
                success: function(result){
                    if (result.success = true) {
						$('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            toastr.info('Proses Pembayaran Dibatalkan!');
							calculate()
						})
					} else {
                        toastr.error('gagal membatalkan!');
					}
                }
            })
            $('#diskon').val(0);
            $('#cash').val(0);
            $('#customer').val(0).change();
            $('#barcode').val('');
            $('#barcode').focus();
        }
    })
</script>