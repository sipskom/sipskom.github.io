<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Service</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
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
                <h3 class="card-title">Data Service</h3>
                <!-- <div class="float-right">
                    <a href="<?=site_url('service/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div> -->
            </div>
            <div class="card-body">
                <table id="table1" class="table table-striped">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No. Service</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>Kerusakan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                            <th style="display: none;">dummy1</th>
                            <th style="display: none;">dummy2</th>
                            <th style="display: none;">dummy3</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                        <?php $no=1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$data->date?></td>
                            <td><?=$data->no_service?></td>
                            <td><?=$data->kategori?></td>
                            <td><?=$data->nama_barang?></td>
                            <td><?=$data->kerusakan?></td>
                            <td <?=$data->status == 'Diproses' ? 'style="text-align: center"' : 'style="display: none;"'?>><span class="badge badge-info"><?=$data->status?></span></td>
                            <td <?=$data->status == 'Dibatalkan' ? 'style="text-align: center"' : 'style="display: none;"'?>><span class="badge badge-warning"><?=$data->status?></span></td>
                            <td <?=$data->status == 'Selesai' ? 'style="text-align: center"' : 'style="display: none;"'?>><span class="badge badge-primary"><?=$data->status?></span></td>
                            <td <?=$data->status == 'Diambil' ? 'style="text-align: center"' : 'style="display: none;"'?>><span class="badge badge-secondary"><?=$data->status?></span></td>
                            <td align="center" width="140px">
                                <a <?=$data->status == 'Diambil' ||$data->status == 'Selesai' || $data->status == 'Dibatalkan' ? 'style="display: none;"' : '' ?> href="<?=site_url('service/batalkan/'.$data->id_service)?>"  class="btn btn-warning btn-xs" onclick="redirect();">
                                <small>Batal</small> </a>
                                <a <?=$data->status == 'Diambil' || $data->status == 'Selesai' || $data->status == 'Dibatalkan' ? 'style="display: none;"' : '' ?> href="<?=site_url('service/selesai/'.$data->id_service)?>"  class="btn btn-primary btn-xs">
                                <small>Selesai</small></a>
                                <a <?=$data->status == 'Diambil' || $data->status == 'Diproses' || $data->status == 'Dibatalkan' ? 'style="display: none;"' : '' ?> href="<?=site_url('service/edit_ambil/'.$data->id_service)?>"  class="btn btn-secondary btn-xs">
                                <small>Ambil</small></a>
                                <a <?=$data->status == 'Diambil' || $data->status == 'Selesai' || $data->status == 'Dibatalkan' ? 'style="display: none;"' : '' ?> href="<?=site_url('service/edit/'.$data->id_service)?>"  class="btn btn-success btn-xs">
                                <small>Edit</small></a>
                                <button <?=$data->status == 'Diambil' || $data->status == 'Selesai' || $data->status == 'Diproses' ? 'style="display: none;"' : '' ?> target="_blank" onclick="window.open('<?=site_url('service/batal_print/'.$data->id_service)?>','_blank')" class="btn btn-xs btn-white btn-secondary"> Cetak Nota</button>  
                                <a href="<?=site_url('service/del/'.$data->id_service)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <small>Hapus</small></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
         function redirect() {
            window.open('<?=site_url('service/batal_print/'.$data->id_service)?>');
        }
</script>