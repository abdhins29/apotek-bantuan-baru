<?php
  include("../config/koneksi.php");
  
  $bulan = $_GET['bulan'];
  $obat=$_GET['obat'];
  $date = date("d-m-Y");
  $hari = date("D");
  
if($bulan == "01")
{
  $bln = "Januari";
}
else if($bulan == "02")
{
  $bln == "Februari";
}
else if($bulan == "03")
{
  $bln = "Maret";
}
else if($bulan == "04")
{
  $bln = "April";
}
else if($bulan == "05")
{
  $bln = "Mei";
}
else if($bulan == "06")
{
  $bln = "Juni";
}
else if($bulan == "07")
{
  $bln = "Juli";
}
else if($bulan == "08")
{
  $bln = "Agustus";
}
else if($bulan == "09")
{
  $bln = "September";
}
else if($bulan == "10")
{
  $bln = "Oktober";
}
else if($bulan == "11")
{
  $bln = "November";
}
else if($bulan == "12")
{
  $bln = "Desember";
}
    
?>
<body onload="window.print();">
<center>
<p style="font-size:30px;padding:0px;margin-bottom:-15px;">APOTEK BANTUAN BARU PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. PERINTIS KEMERDEKAAN NO. 29 C PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:0px;">LAPORAN PEMBELIAN OBAT PERJENIS OBAT</p>
<h2>Bulan : <?php echo $bln; ?></h2>
</center>
  <?php 
  $sqlq = mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat WHERE a.kd_obat='$obat'");
  $dataq = mysqli_fetch_assoc($sqlq);
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <td>
          <table style="padding-left: 10%;">
            <tr>
            <th>
              <td>Kode Obat</td>
              <td>:</td>
              <td><?php echo $obat; ?></td>
            </th>
            </tr>
            <tr>
            <th>
              <td>Nama Obat</td>
              <td>:</td>
              <td><?php echo $dataq['nama_obat']; ?></td>
            </th>
            </tr>
            <tr>
            <th>
              <td>Harga Jual</td>
              <td>:</td>
              <td><?php echo $dataq['harga_jual']; ?></td>
            </th>
            </tr>
          </table>
        </td>
      </div>
    </div>
  </div>
  <center>
      <div class="table-responsive">
              <table width="80%" border="1" cellpadding="5">
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
              <table style="padding-top:10px" width="80%" cellpadding="5">
        <tr>
          <td align="right" style="padding-right:30px;">PADANG, <?php echo $date; ?></td>
        </tr>
        <tr>
          <td align="right" style="padding-right:65px;">PIMPINAN</td>
        </tr>
        <tr>
          <td align="right" style="padding-top:50px;">APOTEK BANTUAN BARU</td>
        </tr>
       </table>
      </div>
</center>       
</body>       