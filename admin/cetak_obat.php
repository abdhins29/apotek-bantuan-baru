<?php
  include("../config/koneksi.php");
  $date = date("d-m-Y");
?>
<body onload="window.print();">
<center>
<p style="font-size:30px;padding:0px;margin-bottom:-15px;">APOTEK BANTUAN BARU PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:-12px;">Jl. PERINTIS KEMERDEKAAN NO. 29 C PADANG</p>
<p style="font-size:18px;padding:0px;margin-bottom:0px;">LAPORAN DATA OBAT</p>
<br>
      <div class="table-responsive">
              <table width="80%" border="1" cellpadding="5">
                  <thead>
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