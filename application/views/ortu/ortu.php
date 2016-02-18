<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Laporan Absensi Mahasiswa</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/bootstrap/css/bootstrap.min.css';?>">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'asset/AdminLTE/bootstrap/css/template/starter-template.css';?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand">Sistem Absensi Terintegrasi Sekolah Vokasi UGM</a>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="page-header">
        <h1>Profil Mahasiswa</h1>
      </div>
      <div class="row">
        <div class="col-md-2">
          <img style="width: 200px; height: 250px;" class="img-thumbnail" src="<?php echo base_url().'asset/AdminLTE/dist/img/user2-160x160.jpg';?>">
        </div>
        <div class="col-md-4">
          <table class="table">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php 
                      print_r($absensiMahasiswa[0]['nama_mahasiswa']);
                    ?>
                </td>
              </tr>
          </table>
        </div>
      </div>
      <br><br><br><br><br><br>
      <div class="page-header">
        <h1>Daftar mata kuliah yang diambil</h1>
      </div>
      
      <div class="row">
        <?php foreach ($absensiMahasiswa as $row) { ?>
        <div class="col-md-4">
          <h3><?= $row['mata_kuliah']; ?></h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <td>Pertemuan Ke</td>
                <td>Tanggal</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php for($i=0; $i < count($row['status']) ; $i++) { ?>
              <tr>
                <td><?= $i+1;?></td>
                <td><?= $row['tanggal'][$i]; ?></td>
                <td><?= $row['status'][$i]; ?></td>
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <?php } ?>
      </div>
      

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'asset/AdminLTE/bootstrap/js/bootstrap.min.js';?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>