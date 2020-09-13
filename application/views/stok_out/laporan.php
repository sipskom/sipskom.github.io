<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Stok Keluar</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>dashboard/#">Home</a></li>
              <li class="breadcrumb-item active">Data Stok Keluar</li>
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
                <h3 class="card-title">Data Stok Keluar</h3>
                <div class="float-right">
                </div>
            </div>

            <div style="margin-top: 5px;margin-left: 675px;">
            <div style="width: 120px; margin-left: 360px">
            <label class="control-label">Filter</label>
						<select class="form-control" name="filter" id="filter">
              <option value="">-pilih opsi-</option>
              <option value="Tanggal">Tanggal</option>
              <option value="Bulan">Bulan</option>
              <option value="Tahun">Tahun</option>
            </select>
            <button target="_blank" onclick="window.open('<?=site_url('laporan/stok/out/by_full')?>','_blank')" name="cetak" id="cetak" style="display: block; margin-top: 10px ; margin-left: 35px" class="btn btn-flat btn-success"><i class="fa fa-print"></i> Cetak</button>    
            </div>
            <div id="filtgl" style="display: none; margin-top: 10px">
                <form method="POST" action="<?= site_url('laporan/stok/out/by_tgl') ?>" target="_blank">
                <div class="row" style="margin-left: 90px;">
                    <div style="margin-left: 5px" class="form-group">
						<label class="control-label">Start Date</label>
						<input type="date" name="start" id="start" value="<?= date('Y-m-d'); ?>" class="form-control">
					</div>
					<div style="margin-left: 5px" class="form-group">
						<label class="control-label">End Date</label>
                        <input type="date" name="end" id="end" value="<?= date('Y-m-d', strtotime('+30 days')); ?>" class=" form-control">
                    </div>
                </div>
                <button type="submit" name="btntgl" id="btntgl" style="margin-left: 395px" class="btn btn-flat btn-success"><i class="fa fa-print"></i> Cetak</button>
                </form>
            </div>
            <div id="filbln" style="display: none; margin-top: 10px">
                <form method="POST" action="<?= site_url('laporan/stok/out/by_bln') ?>" target="_blank">
                <div class="row" style="margin-left: 340px;">
					<div style="margin-left: 5px" class="form-group">
						<label class="control-label">Bulan</label>
                        <select class="form-control" name="bulan" id="bulan">
                            <option value="">-pilih Bulan-</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="btnbln" id="btnbln" style="margin-left: 395px" class="btn btn-flat btn-success"><i class="fa fa-print"></i> Cetak</button>
                </form>
            </div>
            <div id="filthn" style="display: none; margin-top: 10px">
                <form method="POST" action="<?= site_url('laporan/stok/out/by_thn') ?>" target="_blank">
                <div class="row" style="margin-left: 327px;">
					<div style="margin-left: 5px" class="form-group">
                        <label class="control-label">Tahun</label>
                        <select class="form-control" name="tahun">
                          <option value="">- Pilih Tahun -</option>
                            <?php foreach($tahun as $a){ 
                              $d = $a->date;
                              $thn = explode( "-", $d );
                              for ( $i = 0; $i < count( $thn ); $i++ ) {
                                echo $thn[$i];
                                }
                              ?>
                                <option value="<?php echo $thn[0]; ?>"><?php echo $thn[0]; ?>   </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="btnbln" id="btnbln" style="margin-left: 395px" class="btn btn-flat btn-success"><i class="fa fa-print"></i> Cetak</button>
                </form>
            </div>
            </div>
            
            <div class="card-body">
            <table style="margin-top: 10px;" class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Barcode</th>
						<th class="text-center">Nama Barang</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Keterangan</th>
						<th class="text-center">Qty</th>
					</tr>
				</thead>
				<tbody>
          <?php $no = 1;?>
          <?php foreach ($result as $key => $data) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td class="text-center"><?= date('m/d/Y', strtotime($data->waktu_stokout)) ?></td>
							<td><?= $data->barcode ?></td>
							<td><?= $data->nama_barang ?></td>
							<td class="text-center"><?= $data->nama_kategori ?></td>
							<td><?= $data->stok_detail ?></td>
							<td class="text-right"><?= $data->qty ?></td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
                        <td colspan="6" class="text-right">
                            <b>Total Stok Keluar</b>
                        </td>
                    <td colspan="6" class="text-right" style="color: blue;">
							<?php foreach ($grand_total as $key => $data) { ?>
								<?= $data->grand_total ?>
							<?php } ?>
						</td>
						
					</tr>
				</tfoot>
			</table>
            </div>
        </div>
    </div>

<script>
$(document).ready(function(){
$("#filter").change(function() {
  if ($("#filter option:selected").val() == 'Tanggal') {
          document.getElementById('filtgl').style.display = 'block';
          document.getElementById('filbln').style.display = 'none';
          document.getElementById('filthn').style.display = 'none';
          document.getElementById('cetak').style.display = 'none';
			} else if ($("#filter option:selected").val() == 'Bulan') {
          document.getElementById('filtgl').style.display = 'none';
          document.getElementById('filbln').style.display = 'block';
          document.getElementById('filthn').style.display = 'none';
          document.getElementById('cetak').style.display = 'none';
        } else if ($("#filter option:selected").val() == 'Tahun') {
          document.getElementById('filtgl').style.display = 'none';
          document.getElementById('filbln').style.display = 'none';
          document.getElementById('filthn').style.display = 'block';
          document.getElementById('cetak').style.display = 'none';
        } else {
          document.getElementById('filtgl').style.display = 'none';
          document.getElementById('filbln').style.display = 'none';
          document.getElementById('filthn').style.display = 'none';
          document.getElementById('cetak').style.display = 'block';
        }
		});
});
</script>