<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Beli</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Beli</h3>
            </div>      <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <a href="inputbeli.php" target="_blank();" class="btn btn-primary" style="margin:5px"><i class="fa fa-form"></i> Tambah</a>                
                <?php
                error_reporting(0);
                  $qq1=mysqli_query($konek,"SELECT * FROM keranjang_beli");
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
                      <th style="text-align: center;">Kode Suplier</th>
                      <th style="text-align: center;">Kode Obat</th>
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
                    $query  = mysqli_query($konek,"SELECT * FROM keranjang_beli 
      ");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['idbeli']; ?></td>
                      <td style="text-align: center;"><?php echo $data['kd_suplier']; ?></td>
                      <td style="text-align: center;"><?php echo $data['kd_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_transaksi']; ?></td>
                      <td style="text-align: center;"><?php echo $data['jml_beli']; ?></td>
                      <td style="text-align: center;"><?php echo $data['total_transaksi']; ?></td>
                      <td style="text-align: center;">
                        <a href="hapus.php?id=<?php echo $data['kdk']; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
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
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Beli</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
            <!-- /.box-header -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">No Transaksi</th>
                      <th style="text-align: center;">Tanggal Transaksi</th>
                      <th style="text-align: center;">Nama Suplier</th>
                      <th style="text-align: center;">Nama Obat</th>
                      <th style="text-align: center;">Tanggal EXP</th>
                      <th style="text-align: center;">Harga</th>
                      <th style="text-align: center;">Jumlah Beli</th>
                      <th style="text-align: center;">Total Biaya</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    include ("../config/koneksi.php");
                    $query  = mysqli_query($konek,"SELECT * FROM transaksi_beli a LEFT JOIN detail_transaksi b ON a.id_tr=b.id_tr LEFT JOIN detail_obat c ON b.kd_obat=c.kd_obat LEFT JOIN obat d ON b.kd_obat=d.kd_obat AND c.kd_obat=d.kd_obat LEFT JOIN suplier e ON a.kd_suplier=e.kd_suplier ORDER BY a.no_transaksi ASC");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['no_transaksi']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_transaksi']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_suplier']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_exp']; ?></td>
                      <td style="text-align: center;"><?php echo $data['harga_modal']; ?></td>
                      <td style="text-align: center;"><?php echo $data['jml_beli']; ?></td>
                      <td style="text-align: center;"><?php echo $data['total_transaksi']; ?></td>
                      <td style="text-align: center;">
                        <a href="hapusbeli.php?id=<?php echo $data['no_transaksi']; ?>&sub=<?php echo $data['sub_transaksi']; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="cetak_beli.php?id=<?php echo $data['no_transaksi']; ?>" class="btn btn-md btn-success"><i class="fa fa-print"></i></a>
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