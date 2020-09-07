<?php 
include ("../config/koneksi.php");
$kd_obat = $_GET['id'];
?>
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
        <li><a href="#"><i class="fa fa-home"></i> Kelola Obat</a></li>
        <li class="active">Edit Obat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Obat</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <div class="form-horizontal">
            <?php
            include ('../config/koneksi.php'); 
            $query  = mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat WHERE a.kd_obat=b.kd_obat");
            $data=mysqli_fetch_assoc($query);
            ?>
            <form action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Obat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="kd_obat" value="<?php echo $data['kd_obat']; ?>"readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Obat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_obat" value="<?php echo $data['nama_obat']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal Exp</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="tgl_exp" value="<?php echo $data['tgl_exp']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Kategori</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="kd_kategori" value="<?php echo $data['kd_kategori']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Stok</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="jumlah" value="<?php echo $data['jumlah']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga Modal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="harga_modal" value="<?php echo $data['harga_modal']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Harga Jual</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="harga_jual" value="<?php echo $data['harga_jual']; ?>">
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
    $kd_obat = $_POST['kd_obat'];
    $nama_obat = $_POST['nama_obat'];
    $kd_kategori = $_POST['kd_kategori'];
    $jumlah = $_POST['jumlah'];
    $harga_modal = $_POST['harga_modal'];
    $harga_jual = $_POST['harga_jual'];
    $total = $jumlah * $harga_jual;
    
    mysqli_query($konek,"UPDATE obat SET kd_kategori = '$kd_kategori', nama_obat = '$nama_obat', harga_jual = '$harga_jual', total_jumlah = '$total' WHERE kd_obat = '$kd_obat'");
    mysqli_query($konek,"UPDATE detail_obat SET harga_modal = '$harga_modal', jumlah = '$jumlah' WHERE kd_obat = '$kd_obat'");
    echo mysqli_error($konek);
    echo '<script>alert("Edit Obat Berhasil!");</script>';
    echo '<script>window.location.href="index.php?page=kelolaobat"</script>';
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