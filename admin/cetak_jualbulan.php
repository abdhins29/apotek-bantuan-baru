<?php
  include("../config/koneksi.php");
  
  $bulan = $_GET['bulan'];
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
<p style="font-size:18px;padding:0px;margin-bottom:0px;">LAPORAN PENJUALAN OBAT</p>
<h2>Bulan : <?php echo $bln; ?></h2>
      <div class="table-responsive">
              <table width="80%" border="1" cellpadding="5">
                  <thead>
                    <tr align="center">
                      <td><b>No</b></td>
                      <td><b>No Faktur</b></td>
                      <td><b>Tanggal Faktur</b></td>
                      <td><b>Jumlah Item</b></td>
                      <td><b>Total Jumlah</b></td>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
                    include ("../config/koneksi.php"); 
                    $query=mysqli_query($konek,"SELECT * FROM transaksi_jual a LEFT JOIN detail_jual b ON a.id_tr=b.id_tr WHERE month(a.tgl_jual) = '$bulan' GROUP BY a.no_faktur ASC");
                    ?>
                 <tbody>
                  <?php
                    while($data=mysqli_fetch_assoc($query)){
                    $no++;
                    $total=$total+$data['total_jual'];      
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