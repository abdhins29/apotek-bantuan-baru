<?php

include ("../config/koneksi.php");
$kd_suplier= $_GET['id'];

mysqli_query($konek,"DELETE FROM suplier WHERE kd_suplier = '$kd_suplier'");

echo mysqli_error($konek);
echo '<script>alert("Data Suplier Berhasil Dihapus!");</script>';
echo '<script>window.location.href="index.php?page=kelolasuplier";</script>';

?>