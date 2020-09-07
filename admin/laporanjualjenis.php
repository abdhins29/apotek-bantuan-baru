<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lihat Laporan Penjualan Obat Perjenis Obat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Penjualan Obat Perjenis Obat</h3>
            </div>
            <div class="container">
            <form role="form" action="" method="post">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
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
                    <select name="obat" class="form-control select2" required="">    
                      <option value="0" selected="">-- Silahkan Pilih Obat --</option>
                      <?php 
                        include ("../config/koneksi.php");
                        $qwe = mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat WHERE a.kd_obat=b.kd_obat");
                        while($dwe = mysqli_fetch_assoc($qwe)){
                      ?>
                          <option value="<?php echo $dwe['kd_obat']; ?>"><?php echo $dwe['nama_obat']; ?></option>
                      <?php 
                      }
                      ?>
                    </select>
                      <span class="input-group-btn"><button class="btn btn-md btn-success login-submit-cs" type="submit" name="check">Check</button></span>
                  </div>
                </div>
              </div>
            </form>
          </div>
<?php
    if(isset($_POST['check']))
    {
        $bulan = $_POST['bulan'];
        $obat = $_POST['obat'];
?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
            <a href="cetak_jualjenisbulan.php?bulan=<?php echo $bulan;?>&obat=<?php echo $obat; ?>" target="_blank();" class="btn btn-default pull-right" style="margin:5px"><i class="fa fa-print"></i> Cetak</a>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <td><b>No</b></td>
                      <td><b>No Faktur</b></td>
                      <td><b>Tanggal Faktur</b></td>
                      <td><b>Jumlah Item</b></td>
                      <td><b>Total Penjualan</b></td>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
                    $totalbiaya = 0;
                    include ("../config/koneksi.php"); 
                    $query=mysqli_query($konek,"SELECT * FROM transaksi_jual a LEFT JOIN detail_jual b ON a.id_tr=b.id_tr LEFT JOIN obat d ON a.kd_obat=d.kd_obat LEFT JOIN detail_obat e ON d.kd_obat=e.kd_obat WHERE month(a.tgl_jual) = '$bulan' AND a.kd_obat= '$obat' GROUP BY a.no_faktur");
                    ?>
                 <tbody>
                  <?php
                    while($data=mysqli_fetch_assoc($query)){
                    $no++;      
                  ?>
                  <tr>
                    <td align="right"><?php echo $no; ?></td>
                    <td><?php echo $data['no_faktur']; ?></td>
                    <td><?php echo $data['tgl_jual']; ?></td>
                    <?php 
                      $qwe = mysqli_query($konek,"SELECT SUM(total_jual) as ttl, COUNT(*) as jumlah FROM transaksi_jual WHERE no_faktur='$data[no_faktur]' AND month(tgl_jual) = '$bulan' GROUP BY no_faktur ASC");
                      $dwe=mysqli_fetch_assoc($qwe);
                      $total=$total+$dwe['ttl'];
                    ?>
                    <td align="right"><?php echo $dwe['jumlah']; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($dwe['ttl'],0,',','.'); ?></td>
                  </tr>
                  <?php 
                    }
                    echo mysqli_error($konek);
                  ?>
                  <tr>
                    <td colspan="4" align="center"> Total Jumlah </td>
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