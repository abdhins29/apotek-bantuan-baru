<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Suplier</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Suplier</h3>
            </div>      <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <a href="inputsuplier.php" target="_blank();" class="btn btn-primary" style="margin:5px"><i class="fa fa-form"></i> Tambah</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Kode Suplier</th>
                      <th style="text-align: center;">Nama Suplier</th>
                      <th style="text-align: center;">Nama Obat</th>
                      <th style="text-align: center;">Alamat</th>
                      <th style="text-align: center;">Email</th>
                      <th style="text-align: center;">No. Telp</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    include ("../config/koneksi.php");
                    $query  = mysqli_query($konek,"SELECT * FROM suplier a LEFT JOIN obat b ON a.kd_obat=b.kd_obat WHERE a.kd_obat=b.kd_obat ORDER BY a.kd_suplier ASC");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['kd_suplier']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_suplier']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['alamat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['email']; ?></td>
                      <td style="text-align: center;"><?php echo $data['no_tlp']; ?></td>
                      <td style="text-align: center;">
                        <a href="editsuplier.php?id=<?php echo $data['kd_suplier']; ?>" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>
                        <a href="hapussuplier.php?id=<?php echo $data['kd_suplier']; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->