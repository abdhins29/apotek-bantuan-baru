<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lihat Laporan Data Obat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Data Obat</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
            <a href="cetak_obat.php" target="_blank();" class="btn btn-default pull-right" style="margin:5px"><i class="fa fa-print"></i> Cetak</a>
              <table id="example1" class="table table-bordered table-striped">
                  <thead >
                    <tr align="center">
                      <td><b>No</b></td>
                      <td><b>Kode Obat</b></td>
                      <td><b>Nama Obat</b></td>
                      <td><b>Nama Kategori</b></td>
                      <td><b>Jumlah</b></td>
                      <td><b>Harga Jual</b></td>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
                    include ("../config/koneksi.php"); 
                    $query=mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat LEFT JOIN kategori c ON a.kd_kategori=c.kd_kategori WHERE a.kd_obat=b.kd_obat GROUP BY a.kd_obat");
                    ?>
                 <tbody>
                  <?php
                    while($data=mysqli_fetch_assoc($query)){
                    $no++;      
                  ?>
                  <tr>
                    <td align="right"><?php echo $no; ?></td>
                    <td><?php echo $data['kd_obat']; ?></td>
                    <td><?php echo $data['nama_obat']; ?></td>
                    <td><?php echo $data['nama_kategori']; ?></td>
                    <td align="right"><?php echo $data['jumlah']; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($data['harga_jual'],0,',','.'); ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  <div class="control-sidebar-bg"></div>
</div>