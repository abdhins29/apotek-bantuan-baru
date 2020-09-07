<?php

include ("../config/koneksi.php");
$kd_kategori= $_GET['id'];

mysqli_query($konek,"DELETE FROM kategori WHERE kd_kategori = '$kd_kategori'");

echo mysqli_error($konek);
echo '<script>alert("Data Kategori Berhasil Dihapus!");</script>';
echo '<script>window.location.href="index.php?page=kelolakategori";</script>';

?>