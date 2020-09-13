<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard
				<small>Bandung Computer</small>
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>assets/#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?=$total_penjualan?></h3>

              <p>Data Terekam</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer"><b>PENJUALAN</b></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-4 col-8">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?=$total_retur?></h3>
              
              <p>Data Terekam</p>
              </div>
              <div class="icon">
                <i class="fa fa-reply-all"></i>
              </div>
              <a href="#" class="small-box-footer"><b>PENGEMBALIAN</b></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?=$total_service?><sup style="font-size: 20px"></sup></h3>
              
              <p>Data Terekam</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="#" class="small-box-footer"><b>SERVICE</b></a>
          </div>
        </div>
          <!-- ./col -->
        </div>
      

      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Data Service Terekam</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-hourglass-start"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"> Diproses</span>
              <span class="info-box-number"><?=$proses; ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dibatalkan</span>
              <span class="info-box-number"><?=$batal;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Selesai</span>
              <span class="info-box-number"><?=$selesai;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-cubes"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Diambil</span>
              <span class="info-box-number"><?=$ambil;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

      
      
      <!-- <div>
        <img src="<?=site_url('uploads/dash.jpg')?>" style="width : 1000px; height:200px">
      </div> -->
      </div>
    </script>