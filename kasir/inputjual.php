<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apotek Bantuan Baru | Kasir</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../admin/dist/css/skins/skin-yellow.min.css">
  <link rel="stylesheet" href="../admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../admin/plugins/iCheck/all.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../admin/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
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

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../admin/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><strong>Kasir</strong></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="index.php">
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
            <li><a href="?page=kelolajual"><i class="fa fa-circle-o"></i> Kelola Jual</a></li>
          </ul>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
    <?php
        if(@$_GET['page'] == 'kelolajual'){
          include ("kelolajual.php");
        }else{
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Kelola Jual</a></li>
        <li class="active">Tambah Jual</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Jual</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <div class="form-horizontal">
            <form action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Obat</label>
                  <div class="col-sm-8">
                    <select name="nama_obat" id="nama_obat" class="form-control">
                    <option value="--Silahkan Pilih--">--Silahkan Pilih--</option>
                  <?php
                  $daftar_barang = array();
                  include ("../config/koneksi.php"); 
                  $qq = mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat ORDER BY tgl_exp ASC");
                  while($dd = mysqli_fetch_assoc($qq)){
                    $daftar_barang[] = $dd;
                  ?>
                    <option value="<?php echo $dd['kd_obat']; ?>"><?php echo $dd['nama_obat'] ?></option>
                  <?php 
                  }
                  ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode EXP</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="kd_exp" name="kd_exp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-8">
                    <input type="text" name="jml_jual" id="jml_jual" placeholder="Masukan Jumlah Beli" required="required" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Total Biaya</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="total_jual" name="total_jual" readonly="readonly">
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
    $q4 = mysqli_query($konek,"SELECT * FROM keranjang ORDER BY idkeranjang DESC");
    $dt4 = mysqli_fetch_assoc($q4);
    $hml4 = mysqli_num_rows($q4);
    if($hml4==0){
      $sub_faktur4='KR001';
      }else{
        $suid4 = substr($dt4['idkeranjang'],3);
        if($suid4>0 && $suid4<=8){
          $su4 = $suid4+1;
          $sub_faktur4='KR00'.$su4;
        }elseif($suid4>=9 && $suid4<=100){
          $su4 = $suid4+1;
          $sub_faktur4='KR0'.$su4;
        }elseif($suid4>=99 && $suid4<=1000){
          $su4 = $suid4+1;
          $sub_faktur4='KR'.$su4;
        }
      }
      //kode keranjang//

    $tgl_jual = date('Y-m-d');
    $total_jual = $_POST['total_jual'];
    $jml_jual = $_POST['jml_jual'];    
    $harga_jual = $_POST['harga_jual'];
    $kd_obat = $_POST['nama_obat'];
    $kd_exp = $_POST['kd_exp'];

    mysqli_query($konek,"INSERT INTO keranjang VALUES('$sub_faktur4','$kd_exp','$kd_obat','$tgl_jual','$jml_jual','$total_jual')");
    
    echo mysqli_error($konek);
      echo '<script>alert("Berhasil Menyimpan Transaksi!");</script>';
      echo '<script>window.location.href="../kasir/index.php?page=kelolajual"</script>';
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
  document.getElementById("harga_jual").value = 0; 
  document.getElementById("kd_exp").value = 0;
  document.getElementById("jml_jual").value = 0;

  function tampilkanHargaBarang()
  {
    var barang = <?php echo json_encode($daftar_barang); ?>;
    var barang_terpilih = document.getElementById("nama_obat").selectedIndex;
    var harga = 0;
    var exp = 0;
    if(barang_terpilih != 0)
    {
      harga = barang[barang_terpilih-1].harga_jual;
      exp = barang[barang_terpilih-1].kd_exp;
    }
    document.getElementById("harga_jual").value = harga;
    document.getElementById("kd_exp").value = exp;
  }

  function hitungTotalHarga()
  {
    var jumlah = document.getElementById("jml_jual").value;
    var harga = document.getElementById("harga_jual").value;
    var total = jumlah * harga;
    if(!isNaN(total))
    {
      document.getElementById("total_jual").value = total;
    }
    else
    {
      document.getElementById("total_jual").value = 0;
    }
  }

  // Daftarkan fungsi ke element HTML
  document.getElementById("nama_obat").addEventListener("change", tampilkanHargaBarang);
  document.getElementById("jml_jual").addEventListener("keyup", hitungTotalHarga);
</script>


<script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="../admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
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
      radioClas
  })
  })
</script>
</body>
</html>