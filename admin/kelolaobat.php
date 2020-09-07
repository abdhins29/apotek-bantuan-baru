<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Content Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Kelola Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kelola Obat</h3>
            </div>      <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <a href="inputobat.php" target="_blank();" class="btn btn-primary" style="margin:5px"><i class="fa fa-form"></i> Tambah</a>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Kode Obat</th>
                      <th style="text-align: center;">Nama Obat</th>
                      <th style="text-align: center;">Tanggal EXP</th>
                      <th style="text-align: center;">Nama Kategori</th>
                      <th style="text-align: center;">Stok</th>
                      <th style="text-align: center;">Harga Modal</th>
                      <th style="text-align: center;">Harga Jual</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    include ("../config/koneksi.php");
                    $query  = mysqli_query($konek,"SELECT * FROM obat a LEFT JOIN detail_obat b ON a.kd_obat=b.kd_obat LEFT JOIN kategori c ON a.kd_kategori=c.kd_kategori WHERE a.kd_obat=b.kd_obat ORDER BY a.kd_obat ASC");
                    while($data = mysqli_fetch_assoc($query)){
                    $no++;
                    ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td style="text-align: center;"><?php echo $data['kd_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_obat']; ?></td>
                      <td style="text-align: center;"><?php echo $data['tgl_exp']; ?></td>
                      <td style="text-align: center;"><?php echo $data['nama_kategori']; ?></td>
                      <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>
                      <td style="text-align: center;"><?php echo $data['harga_modal']; ?></td>
                      <td style="text-align: center;"><?php echo $data['harga_jual']; ?></td>
                      <td style="text-align: center;">
                        <a href="editobat.php?id=<?php echo $data['kd_obat']; ?>" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>
                        <a href="hapusobat.php?id=<?php echo $data['kd_obat']; ?>" class="btn btn-md btn-danger"><i class="fa fa-trash"></i></a>
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