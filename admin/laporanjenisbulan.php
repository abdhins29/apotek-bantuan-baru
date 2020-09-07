<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Lihat Laporan Pembelian Obat Perjenis Obat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Pembelian Obat Perjenis Obat</h3>
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
            <a href="cetak_jenisbulan.php?bulan=<?php echo $bulan;?>&obat=<?php echo $obat; ?>" target="_blank();" class="btn btn-default pull-right" style="margin:5px"><i class="fa fa-print"></i> Cetak</a>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr align="center">
                      <td><b>No</b></td>
                      <td><b>No Transaksi</b></td>
                      <td><b>Tanggal Transaksi</b></td>
                      <td><b>Suplier</b></td>
                      <td><b>Harga Modal</b></td>
                      <td><b>Jumlah</b></td>
                      <td><b>Total Pembelian</b></td>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
                    include ("../config/koneksi.php"); 
                    $query=mysqli_query($konek,"SELECT * FROM transaksi_beli a LEFT JOIN detail_transaksi b ON a.id_tr=b.id_tr LEFT JOIN suplier c ON a.kd_suplier=c.kd_suplier LEFT JOIN obat d ON b.kd_obat=d.kd_obat LEFT JOIN detail_obat e ON d.kd_obat=e.kd_obat WHERE month(a.tgl_transaksi) = '$bulan' AND b.kd_obat= '$obat' GROUP BY a.no_transaksi");
                    ?>
                 <tbody>
                  <?php
                    while($data=mysqli_fetch_assoc($query)){
                    $no++;      
                  ?>
                  <tr>
                    <td align="right"><?php echo $no; ?></td>
                    <td><?php echo $data['no_transaksi']; ?></td>
                    <td><?php echo $data['tgl_transaksi']; ?></td>
                    <td><?php echo $data['nama_suplier'] ?></td>
                    <td align="right"><?php echo "Rp ".number_format($data['harga_modal'],0,',','.'); ?></td>
                    <td align="right"><?php echo $data['jml_beli'] ?></td>
                    <?php 
                    $totalbiaya = $data['harga_modal'] * $data['jml_beli'];
                    $total=$total+$totalbiaya;
                    ?>
                    <td align="right"><?php echo "Rp ".number_format($totalbiaya,0,',','.'); ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                  <tr>
                    <td colspan="6" align="center"> Total </td>
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