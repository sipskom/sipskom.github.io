<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data
				<small>Customers</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
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
                <h3 class="card-title">Data Customer</h3>
                <div class="float-right">
                    <a href="<?=site_url('customer/add')?>" class="btn btn-primary">
                        <i class="fa fa-user-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <table id="table1" class="table table-striped">
                    <thead>
                        <tr align="center">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telepon/HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 10pt;">
                        <?php $no=1;
                        foreach($row->result() as $key => $data) { ?>
                        <tr>
                            <td align="center"><?=$no++?></td>
                            <td><?=$data->nama?></td>
                            <td align="center"><?=$data->jk == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->no_telp?></td>   
                            <td align="center" width="140px">
                                <a href="<?=site_url('customer/edit/'.$data->id_customer)?>"  class="btn btn-success btn-xs">
                                <i class="fa fa-edit"></i> Edit</a>
                                <a href="<?=site_url('customer/del/'.$data->id_customer)?>" onclick="return confirm('Ingin Menghapus Data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>