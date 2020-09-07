<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Jual</li>
      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Jual</h3>
            </div>      <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <a href="inputjual.php" target="_blank();" class="btn btn-primary" style="margin:5px"><i class="fa fa-form"></i> Tambah</a>
                <?php
				error_reporting(0);
					$qq1=mysqli_query($konek,"SELECT * FROM keranjang");
					$jml1=mysqli_num_rows($qq1);
					if($jml1<1){
					}else{
				?>
				<a href="selesai.php" class="btn btn-success" >Selesai Belanja</a>
				<?php 
					}
				?>
				<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Kode Keranjang</th>
                      <th style="text-align: center;">Kode Exp</th>
                      <th style="text-align: center;">Nama Obat</th>
                      <th style="text-align: center;">Tanggal jual</th>
                      <th style="text-align: center;">Jumlah jual</th>
                      <th style="text-align: center;">Total Biaya</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    include ("../config/koneksi.php");
                    $query  = mysqli_query($konek,"SELECT * FROM keranjang a LEFT JOIN obat b ON a.kd_obat=b.kd_obat");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['idkeranjang']; ?></td>
                      <td style="text-align: center;"><?php echo $data['kd_exp']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_jual']; ?></td>
                      <td style="text-align: center;"><?php echo $data['jml_jual']; ?></td>
                      <td style="text-align: center;"><?php echo $data['total_jual']; ?></td>
                      <td style="text-align: center;">
                        <a href="hapus.php?id=<?php echo $data['idkeranjang']; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                    }
					echo mysqli_error($konek);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Jual</h3>
            </div>      <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">No Faktur</th>
                      <th style="text-align: center;">Tanggal Faktur</th>
                      <th style="text-align: center;">Nama Obat</th>
                      <th style="text-align: center;">Tanggal Exp</th>
                      <th style="text-align: center;">Harga</th>
                      <th style="text-align: center;">Jumlah</th>
                      <th style="text-align: center;">Total Biaya</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    include ("../config/koneksi.php");
                    $query  = mysqli_query($konek,"SELECT * FROM transaksi_jual a LEFT JOIN detail_jual b ON a.id_tr=b.id_tr LEFT JOIN detail_obat c ON a.kd_obat=c.kd_obat LEFT JOIN obat d ON a.kd_obat=d.kd_obat AND c.kd_obat=d.kd_obat ORDER BY a.no_faktur ASC");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['no_faktur']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_jual']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_exp']; ?></td>
                      <td style="text-align: center;"><?php echo $data['harga_jual']; ?></td>
                      <td style="text-align: center;"><?php echo $data['jml_jual']; ?></td>
                      <td style="text-align: center;"><?php echo $data['total_jual']; ?></td>
                      <td style="text-align: center;">
                        <a href="cetak_faktur.php?id=<?php echo $data['no_faktur']; ?>" class="btn btn-md btn-success"><i class="fa fa-print"></i></a>
                      </td>
                    </tr>
                    <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->