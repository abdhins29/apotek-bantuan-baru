<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apotek Bantuan Baru | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-purple.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>BB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Apotek</b> Bantuan Baru</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="user user-menu">
            <!-- Menu Toggle Button -->
            <a href="../logout.php">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Log-out</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><strong>Admin</strong></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="../admin/index.php">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Form</spn>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=kelolauser"><i class="fa fa-circle-o"></i> Kelola User</a></li>
            <li><a href="?page=kelolaobat"><i class="fa fa-circle-o"></i> Kelola Obat</a></li>
            <li><a href="?page=kelolakategori"><i class="fa fa-circle-o"></i> Kelola Kategori</a></li>
            <li><a href="?page=kelolasuplier"><i class="fa fa-circle-o"></i> Kelola Suplier</a></li>
            <li><a href="?page=kelolabeli"><i class="fa fa-circle-o"></i> Kelola Beli</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Laporan</spn>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=laporanobat"><i class="fa fa-circle-o"></i> Laporan Data Obat</a></li>
            <li><a href="?page=laporanobatbulan"><i class="fa fa-circle-o"></i> Laporan Beli Obat Bulan</a></li>
            <li><a href="?page=laporanjenisbulan"><i class="fa fa-circle-o"></i> Laporan Beli Jenis Obat Bulan</a></li>
            <li><a href="?page=laporanjualbulan"><i class="fa fa-circle-o"></i> Laporan Jual Obat Bulan</a></li>
            <li><a href="?page=laporanjualjenis"><i class="fa fa-circle-o"></i> Laporan Jual Jenis Obat Bulan</a></li>
            <li><a href="?page=laporanseluruh"><i class="fa fa-circle-o"></i> Laporan Jual Seluruh Obat</a></li>
          </ul>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
    <?php
        if(@$_GET['page'] == 'kelolauser'){
          include ("kelolauser.php");
        }
        else if(@$_GET['page'] == 'kelolaobat'){
          include"kelolaobat.php";
        }
        else if(@$_GET['page'] == 'kelolakategori'){
          include"kelolakategori.php";
        }
        else if(@$_GET['page'] == 'kelolasuplier'){
          include"kelolasuplier.php";
        }
        else if(@$_GET['page'] == 'kelolabeli'){
          include"kelolabeli.php";
        }
        else if(@$_GET['page'] == 'laporanobat'){
          include"laporanobat.php";
        }
        else if(@$_GET['page'] == 'laporanobatbulan'){
          include"laporanobatbulan.php";
        }
        else if(@$_GET['page'] == 'laporanjenisbulan'){
          include"laporanjenisbulan.php";
        }
        else if(@$_GET['page'] == 'laporanjualbulan'){
          include"laporanjualbulan.php";
        }
        else if(@$_GET['page'] == 'laporanjualjenis'){
          include"laporanjualjenis.php";
        }
        else if(@$_GET['page'] == 'laporanseluruh'){
          include"laporanseluruh.php";
        }
        else{
    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Kelola Beli</a></li>
        <li class="active">Tambah Beli</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Beli</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <div class="form-horizontal">
            <form action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Suplier</label>
                  <div class="col-sm-8">
                    <select name="nama_suplier" id="nama_suplier" class="form-control">
                    <option value="--Silahkan Pilih--">--Silahkan Pilih--</option>
                  <?php
                  include ("../config/koneksi.php");
                  $daftar_obat = array(); 
                  $qq = mysqli_query($konek,"SELECT * FROM suplier a LEFT JOIN obat b ON a.kd_obat=b.kd_obat LEFT JOIN detail_obat c ON b.kd_obat=c.kd_obat ORDER BY kd_suplier ASC");
                  while($dd = mysqli_fetch_assoc($qq)){
                    $daftar_obat[] = $dd;
                  ?>
                    <option value="<?php echo $dd['kd_suplier']; ?>"><?php echo $dd['nama_suplier'] ?></option>
                  <?php 
                  }
                  ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Obat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kd_obat" name="kd_obat">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Obat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal EXP</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tgl_exp" name="tgl_exp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga_modal" name="harga_modal">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="jml_beli" placeholder="Masukan Jumlah Beli" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Total Biaya</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="total_transaksi" name="total_transaksi" readonly="readonly">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                  <div align="center">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </div>
<?php
include("../config/koneksi.php");

  if(isset($_POST['submit']))
  { 

    //kode keranjang//
    $q4 = mysqli_query($konek,"SELECT * FROM keranjang_beli ORDER BY idbeli DESC");
    $dt4 = mysqli_fetch_assoc($q4);
    $hml4 = mysqli_num_rows($q4);
    if($hml4==0){
      $sub_faktur4='BL001';
      }else{
        $suid4 = substr($dt4['idbeli'],3);
        if($suid4>0 && $suid4<=8){
          $su4 = $suid4+1;
          $sub_faktur4='BL00'.$su4;
        }elseif($suid4>=9 && $suid4<=100){
          $su4 = $suid4+1;
          $sub_faktur4='BL0'.$su4;
        }elseif($suid4>=99 && $suid4<=1000){
          $su4 = $suid4+1;
          $sub_faktur4='BL'.$su4;
        }
      }
      //kode keranjang//

    $tgl_transaksi = date('Y-m-d');
    $total_transaksi = $_POST['total_transaksi'];
    $jml_beli = $_POST['jml_beli'];    
    $harga_modal = $_POST['harga_modal'];
    $kd_suplier = $_POST['nama_suplier'];
    $kd_obat = $_POST['kd_obat'];

    mysqli_query($konek,"INSERT INTO keranjang_beli VALUES('$sub_faktur4','$kd_suplier','$kd_obat','$tgl_transaksi','$jml_beli','$total_transaksi')");
    
    echo mysqli_error($konek);
      echo '<script>alert("Berhasil Menyimpan Transaksi!");</script>';
      echo '<script>window.location.href="../admin/index.php?page=kelolabeli"</script>';
      }
?>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <?php
  }
  ?>

<!-- REQUIRED JS SCRIPTS -->
<script>
  

  function resetDetailObat()
  {
    // Nilai default untuk form
    document.getElementById("kd_obat").value = "-";
    document.getElementById("nama_obat").value = "-";
    document.getElementById("tgl_exp").value = "-";
    document.getElementById("harga_modal").value = "0";
    document.getElementsByName("jml_beli")[0].value = "0";
    document.getElementById("total_transaksi").value = "0";
  }

  function tampilDetailObat()
  {
    var daftar_obat = <?php echo json_encode($daftar_obat); ?>;
    var obat_terpilih = document.getElementById("nama_suplier").selectedIndex;
    if(obat_terpilih != 0)
    { 
      document.getElementById("kd_obat").value = daftar_obat[obat_terpilih-1].kd_obat;
      document.getElementById("nama_obat").value = daftar_obat[obat_terpilih-1].nama_obat;
      document.getElementById("tgl_exp").value = daftar_obat[obat_terpilih-1].tgl_exp;
      document.getElementById("harga_modal").value = daftar_obat[obat_terpilih-1].harga_jual;
    }
    else
    {
      resetDetailObat();
    }
  }

  function hitungTotalHarga()
  {
    var harga = document.getElementById("harga_modal").value;
    var jumlah_beli = document.getElementsByName("jml_beli")[0].value;
    var total_harga = harga * jumlah_beli;

    if(isNaN(total_harga))
    {
      total_harga = 0;
    }
    document.getElementById("total_transaksi").value = total_harga;
  }
  // daftarkan fungsi ke event element html
  document.getElementById("nama_suplier").addEventListener("change", tampilDetailObat);
  document.getElementsByName("jml_beli")[0].addEventListener("keyup", hitungTotalHarga);


  // reset form saat halaman diakses
  resetDetailObat()
</script>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

  })
</script>
</body>
</html>