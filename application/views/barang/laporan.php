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
              <li class="breadcrumb-item active">Data Barang</li>
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
                </div>
            </div>

            <div style="margin-top: 5px;margin-left: 675px;">
            <div style="width: 200px; margin-left: 280px">
            <form method="POST" action="<?= site_url('barang/cetak') ?>" target="_blank">
            <label class="control-label">Filter</label>
						<select class="form-control" name="kat" id="kat">
                          <option value="" selected>- Pilih Kategori -</option>
                            <?php foreach($kategori as $a){ 
                              $d = $a->nama;
                              ?>
                                <option value="<?php echo $d; ?>"><?php echo $d; ?>   </option>
                            <?php } ?>
                        </select>
                        <button type="submit" name="cetak" id="cetak" style="margin-top: 10px;margin-left: 100px" class="btn btn-flat btn-success"><i class="fa fa-print"></i> Cetak</button>
            </form>
            </div>
            </div>
            
            <div class="card-body">
            <table style="margin-top: 10px;" class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Detail</th>
                            <th>Harga</th>
                            <th>Stok</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1;?>
          <?php foreach ($result as $key => $data) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td>
                <?php if($data->gambar != null) { ?>
                <img src="<?=base_url('uploads/barang/'.$data->gambar) ?>" style="width:100px">
                <?php }?>
              </td>
							<td><?=$data->barcode?></td>
							<td><?= $data->nama ?></td>
              <td><?= $data->nama_kategori ?></td>
              <td><?=$data->detail?></td>
							<td class="text-right"><?= rp($data->harga) ?></td>
              <td class="text-center"><?= $data->stok ?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
            </div>
        </div>
    </div>