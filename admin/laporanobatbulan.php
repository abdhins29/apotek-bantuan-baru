<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lihat Laporan Pembelian Obat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Pembelian Obat</h3>
            </div>
            <div class="container">
            <form role="form" action="" method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                  <div class="input-group input-group-md">
                    <select name="bulan" class="form-control select2" required="">    
                      <option value="0" selected="">-- Silahkan Pilih Bulan --</option>
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
                      <span class="input-group-btn"><button class="btn btn-md btn-success login-submit-cs" type="submit" name="check">Check</button></span>
                  </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
<?php
    if(isset($_POST['check']))
    {
        $bulan = $_POST['bulan'];
?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
            <a href="cetak_bulan.php?bulan=<?php echo $bulan; ?>" target="_blank();" class="btn btn-default pull-right" style="margin:5px"><i class="fa fa-print"></i> Cetak</a>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <td><b>No</b></td>
                      <td><b>No Transaksi</b></td>
                      <td><b>Tanggal Transaksi</b></td>
                      <td><b>Suplier</b></td>
                      <td><b>Jumlah Item</b></td>
                      <td><b>Total Jumlah</b></td>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
                    include ("../config/koneksi.php"); 
                    $query=mysqli_query($konek,"SELECT * FROM transaksi_beli a LEFT JOIN detail_transaksi b ON a.id_tr=b.id_tr LEFT JOIN suplier c ON a.kd_suplier=c.kd_suplier WHERE month(a.tgl_transaksi) = '$bulan' GROUP BY a.no_transaksi ASC");
                    ?>
                 <tbody>
                  <?php
                    while($data=mysqli_fetch_assoc($query)){
                    $no++;
                    $totals = $data['total_transaksi'];      
                  ?>
                  <tr>
                    <td align="right"><?php echo $no; ?></td>
                    <td><?php echo $data['no_transaksi']; ?></td>
                    <td><?php echo $data['tgl_transaksi']; ?></td>
                    <td><?php echo $data['nama_suplier']; ?></td>
                    <?php 
                      $qwe = mysqli_query($konek,"SELECT SUM(a.total_transaksi) as ttl, COUNT(*) as jumlah FROM transaksi_beli a LEFT JOIN detail_transaksi b ON a.id_tr=b.id_tr AND a.no_transaksi AND b.sub_transaksi");
                      $dwe=mysqli_fetch_assoc($qwe);
                    ?>
                    <td align="right"><?php echo $dwe['jumlah']; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($dwe['ttl'],0,',','.'); ?></td>
                  </tr>
                  <?php
                    $total=$total+$dwe['ttl']; 
                    }
                  ?>
                  <tr align="center">
                    <td colspan="5" align="center"> Total Jumlah </td>
                    <td align="right"><?php echo "Rp ".number_format($total,0,',','.'); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
<?php
    }
?>
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