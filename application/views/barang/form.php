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
        <div class="card card-<?=$warna?> card-outline">
            <div class="card-header">
                <h3 class="card-title"><?=$page?> Data barang</h3>
                <div class="float-right">
                    <a href="<?=site_url('barang')?>" class="btn btn-warning">
                        <i class="fa fa-undo"></i> Kembali</a>
                </div> 
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <?php echo form_open_multipart('barang/proses') ?>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->id_barang ?>">
                                    <label for=""> Barcode *</label>
                                    <input type="text" value="<?=$row->barcode ?>" name="barcode" id="" class="form-control" required> 
                                </div>

                                <div class="form-group">
                                    <label for=""> Nama barang *</label>
                                    <input type="text" value="<?=$row->nama ?>" name="nama" id="" class="form-control" required> 
                                </div>

                                <div class="form-group">
                                    <label for=""> Harga barang *</label>
                                    <input type="text" value="<?=$row->harga ?>" name="harga" id="" class="form-control" required> 
                                </div>

                                <div class="form-group">
                                    <label for=""> Kategori *</label>
                                    <?php echo form_dropdown('kategori', $kategori, $selectedkategori,
                                     ['class' => 'form-control', 'required' => 'required']) ?>
                                </div>

                                <div class="form-group">
                                    <label for=""> Unit *</label>
                                    <?php echo form_dropdown('unit', $unit, $selectedunit,
                                     ['class' => 'form-control', 'required' => 'required']) ?>
                                </div>

                                <div class="form-group">
                                    <label for=""> Gambar </label>
                                    <?php if($page == 'Edit') {
                                        if($row->gambar != null) { ?>
                                        <div style="margin-bottom: 5px;"> 
                                        <img src="<?=base_url('uploads/barang/'.$row->gambar) ?>" style="width:100%">
                                        </div>
                                        <?php
                                        }
                                    } ?>
                                    <input type="file" name="gambar" id="" class="form-control"> 
                                    <small>(Biarkan Kosong Jika Tidak <?=$page == 'Edit' ? 'Diganti' : 'Ada Gambar' ?>)</small>
                                </div>
                                <div class="form-group">
                                    <label for="detail"> Detail Spesifikasi *</label>
                                    <textarea name="detail" class="form-control" style="width: 310px;" cols="100" rows="17"><?=$row->detail ?></textarea>
                                </div>
                        
                            <div class="form-group float-right">
                                <button type="reset" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i> reset</button>
                                <button type="submit" name="<?=$page?>" class="btn btn-info toastsDefaultSuccess">
                                    <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>