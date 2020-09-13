<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Barang</small>
			</h1>
          </div>
          
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
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Barcode Generator</h3>
                <div class="float-right">
                    <a href="<?=site_url('barang')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <?php
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img style="width: 200px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
                ?><br>
                <?=$row->barcode?>
                <br><br>
                <a href="<?=site_url('barang/barcode_print/'.$row->id_barang)?>"  class="btn btn-success btn-xs">
                                <i class="fa fa-print"></i> Cetak</a>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">QrCode Generator</h3>
                <div class="float-right">
                    <a href="<?=site_url('barang')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body" style="margin-top: -32px; margin-left: -6px"> 
                <?php
                $qrCode = new Endroid\QrCode\QrCode($row->barcode);
                $qrCode->writeFile('uploads/qrcode/barang-'.$row->id_barang.'.png');
                ?><br>
                <img src="<?=base_url('uploads/qrcode/barang-'.$row->id_barang.'.png') ?>" style="width: 200px;">
                <br>
                <div style="margin-left: 6px; margin-top: -5px"><?=$row->barcode?></div>
              </div>
        </div>
    </div>