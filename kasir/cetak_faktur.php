<?php
  include("../config/koneksi.php");
  $date = date("d-m-Y");
  $no_faktur = $_GET['id'];
?>
<body onload="window.print();">
<center>
<p style="font-size:30px;padding:0px;margin-bottom:-15px;">APOTEK BANTUAN BARU PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. PERINTIS KEMERDEKAAN NO. 29 C PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:0px;">FAKTUR PENJUALAN</p>
<br>
</center>
  <?php 
  $sqlq = mysqli_query($konek,"SELECT * FROM transaksi_jual a LEFT JOIN detail_jual b ON a.id_tr=b.id_tr LEFT JOIN detail_obat d ON a.kd_obat=d.kd_obat LEFT JOIN obat e ON d.kd_obat=e.kd_obat WHERE a.no_faktur='$no_faktur'");
  $dataq = mysqli_fetch_assoc($sqlq);
  ?>
  <div class="container">
          <table style="padding-left: 10%;" >
            <tr>
              <td>No Faktur</td>
              <td>:</td>
              <td><?php echo $dataq['no_faktur']; ?></td>
            </tr>
            <tr >
              <td>Tanggal Faktur</td>
              <td>:</td>
              <td><?php echo $dataq['tgl_jual']; ?></td>
            </tr>
          </table>
  </div>
  <center>
      <div class="table-responsive">
              <table width="80%" border="1" cellpadding="5">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Obat</th>
                      <th>Nama Obat</th>
                      <th>Harga Jual</th>
                      <th>Jumlah</th>
                      <th>Total Biaya</th>
                    </tr>
                  </thead>
               <?php
                    $no = 0;
                    $total = 0;
					$jmlsq=0;
					$ttl=0;
					$sqlqw = mysqli_query($konek,"SELECT * FROM transaksi_jual a LEFT JOIN detail_jual b ON a.id_tr=b.id_tr LEFT JOIN detail_obat d ON a.kd_obat=d.kd_obat LEFT JOIN obat e ON d.kd_obat=e.kd_obat WHERE a.no_faktur='$no_faktur'");
  while($dataqw = mysqli_fetch_assoc($sqlqw)){
                    $no++;
					$jmlsq=$jmlsq+$dataqw['jml_jual'];
					$ttl=$ttl+$dataqw['total_jual'];					
                  ?>
                 <tbody>
                  <tr>
                    <td align="right"><?php echo $no; ?></td>
                    <td><?php echo $dataqw['kd_obat']; ?></td>
                    <td><?php echo $dataqw['nama_obat']; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($dataqw['harga_jual'],0,',','.'); ?></td>
                    <td align="right"><?php echo $dataqw['jml_jual']; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($dataqw['total_jual'],0,',','.'); ?></td>
                  </tr>
				  
				<?php
				}
				?>
				  	 <tr>
                    <td colspan="4" align="center"> Total </td>
                    <td align="right"><?php echo $jmlsq; ?></td>
                    <td align="right"><?php echo "Rp ".number_format($ttl,0,',','.'); ?></td>
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