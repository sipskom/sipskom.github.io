<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistem Informasi Penjualan Komputer</title>
  <!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css2/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini <?=$this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == 'laporan' ? 'sidebar-collapse' : null?>">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?=base_url()?>assets/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="<?=base_url()?>assets/#" role="button"><?=ucfirst($this->fungsi->user_login()->username) ?>
    <?php if($this->fungsi->user_login()->gambar != null) { ?>
      <img src="<?=base_url('uploads/userphoto/'.$this->fungsi->user_login()->gambar) ?>" class="img-circle elevation-2" alt="User Image" style="height: 24px; width: 24px;">
    <?php }?>
		</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=site_url('dashboard')?>" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/icon3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">SIPKom</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
		  <li class="nav-header">Menu Utama</li>
          <li class="nav-item">
            <a href="<?=site_url('dashboard')?>" <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-warehouse"></i>
              <p>Dashboard</p>
            </a>
      </li>
		  <li class="nav-item">
            <a href="<?=site_url('supplier')?>" <?=$this->uri->segment(1) == 'supplier' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>Pemasok Barang</p>
            </a>
		  </li>
		  <li class="nav-item">
            <a href="<?=site_url('customer')?>" <?=$this->uri->segment(1) == 'customer' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-astronaut"></i>
              <p>Pembeli</p>
            </a>
      </li>
      <li class="nav-item">
            <a href="<?=site_url('service/add')?>" <?=$this->uri->segment(1) == 'service' && $this->uri->segment(2) == 'add' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-astronaut"></i>
              <p>Terima Service</p>
            </a>
      </li>
      <li class="nav-item">
            <a href="<?=site_url('service/finish')?>" <?=$this->uri->segment(1) == 'service' && $this->uri->segment(2) == 'finish' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-astronaut"></i>
              <p>Ambil Service</p>
            </a>
		  </li>
		  <li <?=$this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'barang' || $this->uri->segment(1) == 'unit' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ?>>
            <a href="#" <?=$this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'barang' || $this->uri->segment(1) == 'unit' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-suitcase"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('kategori')?>" <?=$this->uri->segment(1) == 'kategori' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-sitemap nav-icon"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('barang')?>" <?=$this->uri->segment(1) == 'barang' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-suitcase-rolling nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('unit')?>" <?=$this->uri->segment(1) == 'unit' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-memory nav-icon"></i>
                  <p>Unit</p>
                </a>
              </li>
            </ul>
		  </li>
      <li <?=$this->uri->segment(1) == 'stok' || $this->uri->segment(1) == 'penjualan' ||
             $this->uri->segment(1) == 'service' && $this->uri->segment(2) !== 'add' && $this->uri->segment(2) !== 'finish' || $this->uri->segment(1) == 'retur' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ?>>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-donate"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('penjualan')?>" <?=$this->uri->segment(1) == 'penjualan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-store nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('retur')?>" <?=$this->uri->segment(1) == 'retur' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-undo nav-icon"></i>
                  <p>Retur Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('service')?>" <?=$this->uri->segment(1) == 'service' && $this->uri->segment(2) !== 'add' && $this->uri->segment(2) !== 'finish' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-cogs nav-icon"></i>
                  <p>Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('stok/in')?>" <?=$this->uri->segment(1) == 'stok' && $this->uri->segment(2) == 'in' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-caret-square-down nav-icon"></i>
                  <p>Stok Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('stok/out')?>" <?=$this->uri->segment(1) == 'stok' && $this->uri->segment(2) == 'out' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-caret-square-up nav-icon"></i>
                  <p>Stok Keluar</p>
                </a>
              </li>
            </ul>
      </li>
      <li <?=$this->uri->segment(1) == 'laporan' && $this->uri->segment(2) == 'penjualan' ||
             $this->uri->segment(1) == 'laporan' && $this->uri->segment(3) == 'in' ||
             $this->uri->segment(1) == 'laporan' && $this->uri->segment(3) == 'out' ||
             $this->uri->segment(2) == 'barang' || $this->uri->segment(2) == 'customer' ||
             $this->uri->segment(2) == 'supplier' || $this->uri->segment(2) == 'retur' ||
             $this->uri->segment(2) == 'service' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ?>>
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('laporan/barang')?>" <?=$this->uri->segment(2) == 'barang' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/customer')?>" <?=$this->uri->segment(2) == 'customer' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Data Pembeli</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/supplier')?>" <?=$this->uri->segment(2) == 'supplier' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Data Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/penjualan')?>" <?=$this->uri->segment(2) == 'penjualan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/retur')?>" <?=$this->uri->segment(2) == 'retur' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Retur Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/service')?>" <?=$this->uri->segment(2) == 'service' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Service Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/stok/in')?>" <?=$this->uri->segment(1) == 'laporan' && $this->uri->segment(3) == 'in' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Stok Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('laporan/stok/out')?>" <?=$this->uri->segment(1) == 'laporan' && $this->uri->segment(3) == 'out' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
                  <i class="fas fa-file nav-icon"></i>
                  <p>Laporan Stok Keluar</p>
                </a>
              </li>
            </ul>
      </li>
    <?php if($this->fungsi->user_login()->level ==1) { ?>
		<li class="nav-header">Pengaturan</li>
		<li class="nav-item">
            <a href="<?=site_url('user')?>" <?=$this->uri->segment(1) == 'user' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Pengguna</p>
            </a>
      </li>
    <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
    <div class="p-4" style="margin-left: -6px;">
    <?php if($this->fungsi->user_login()->gambar != null) { ?>
      <img src="<?=base_url('uploads/userphoto/'.$this->fungsi->user_login()->gambar) ?>" style="height: 215px; width: 215px" >
    <?php }?>
      <p style="text-align : center;"><b><?= $this->fungsi->user_login()->nama?></b></p>
      <p style="text-align : center;">Alamat :</p>
		  <p style="margin-top: -20px; text-align : center;"><small><?= $this->fungsi->user_login()->alamat?></small></p>
      <p style="text-align : center;">Kontak :</p>
		  <p style="margin-top: -20px; text-align : center;"><small><?= $this->fungsi->user_login()->no_telp?></small></p>
    </div>
	<li class="row" style="margin-top: -30px; margin-left: 55px;">
			<!-- <div class="col-lg-6">
				<a href="#" class="btn btn-default btn-block">profile</a>
			</div> -->
			<div class="col-lg-8">
				<a href="<?=site_url('auth/logout')?>" class="btn btn-danger btn-block">Log Out</a>
			</div>
	  </li>
</aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Bandung Computer
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="<?=site_url('dashboard')?>">SIPSKom</a></strong> <small>(Sistem Informasi Penjualan & Service Komputer)</small>.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js2/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    $('#table1').DataTable();

    $(document).on('click', '#btn_pilih', function(){
      $('#id_barang').val($(this).data('id'));
      $('#barcode').val($(this).data('barcode'));
      $('#nama').val($(this).data('nama'));
      $('#nama_unit').val($(this).data('unit'));
      $('#stok').val($(this).data('stok'));
      $('#m').modal('hide');
    });

    $(document).on('click', '#dtl_stok_in', function(){
      var barcode = $(this).data('barcode');
      var nama_barang = $(this).data('namabarang');
      var nama_supplier = $(this).data('namasupp');
      var detail = $(this).data('detail');
      var qty = $(this).data('qty');
      var date = $(this).data('date');
      $('#barcode').text(barcode);
      $('#nama_barang').text(nama_barang);
      $('#nama_supplier').text(nama_supplier);
      $('#detail').text(detail);
      $('#qty').text(qty);
      $('#date').text(date);
      $('#m').modal('hide');
    });

    $(document).on('click', '#detail_barang', function(){
      var barcode = $(this).data('barcode');
      var nama_barang = $(this).data('namabar');
      var nama_kategori = $(this).data('namakat');
      var detail = $(this).data('detail');
      var stok = $(this).data('stok');
      var harga = $(this).data('harga');
      $('#barcode').text(barcode);
      $('#nama_barang').text(nama_barang);
      $('#nama_kategori').text(nama_kategori);
      $('#detail').text(detail);
      $('#stok').text(stok);
      $('#harga').text(harga);
      $('#m').modal('show');
    });

    $(document).on('click', '#pilih', function(){
      $('#id_barang').val($(this).data('id'));
      $('#barcode').val($(this).data('barcode'));
      $('#harga').val($(this).data('harga'));
      $('#stok').val($(this).data('stok'));
      $('#mbarang').modal('hide');
    });

  });


<?php if($this->session->has_userdata('add')) { ?>
    toastr.success('<?=$this->session->flashdata('add')?>');
<?php }?>

<?php if($this->session->has_userdata('edit')) { ?>
    toastr.info('<?=$this->session->flashdata('edit')?>');
<?php }?>

<?php if($this->session->has_userdata('delete')) { ?>
    toastr.info('<?=$this->session->flashdata('delete')?>');
<?php }?>

<?php if($this->session->has_userdata('error')) { ?>
    toastr.error('<?=$this->session->flashdata('error')?>');
<?php }?>

<?php if($this->session->has_userdata('warning')) { ?>
    toastr.warning('<?=$this->session->flashdata('warning')?>');
<?php }?>

</script>

</body>
</html>
