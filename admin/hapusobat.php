<?php

include ("../config/koneksi.php");
$kd_obat= $_GET['id'];

mysqli_query($konek,"DELETE FROM obat WHERE kd_obat = '$kd_obat'");
mysqli_query($konek,"DELETE FROM detail_obat WHERE kd_obat = '$kd_obat'");

echo mysqli_error($konek);
echo '<script>alert("Data Obat Berhasil Dihapus!");</script>';
echo '<script>window.location.href="index.php?page=kelolaobat";</script>';

?>