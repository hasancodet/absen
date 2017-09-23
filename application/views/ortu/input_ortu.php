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
    <link href="<?php echo base_url().'asset/AdminLTE/bootstrap/css/template/signin.css';?>" rel="stylesheet">

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
          <a class="navbar-brand">Sistem Absensi Terintegrasi KOMSI UGM</a>
        </div>
      </div>
    </nav>
        <div class="container">

      <form method="post" action="<?= base_url().'ortu/tampilAbsensi'?>" class="form-signin">
        <h2 class="form-signin-heading">Masukkan NIM</h2>
        <label for="inputEmail" class="sr-only">NIM</label>
        <input  name="nim" class="form-control" placeholder="NIM" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </form>

    </div> <!-- /container -->
<!-- 
    <div class="container">
      <div class="page-header">
        <h1 style="align:center;">Profil Mahasiswa</h1>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form method="post" action="<?= base_url().'ortu/tampilAbsensi'?>">
            <table class="table">
              <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input class="form-control" name="nim"></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <button class="btn btn-primary" type="submit">Kirim</button>  
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div><!-- /.container --> -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <script src="<?php echo base_url().'asset/AdminLTE/bootstrap/js/bootstrap.min.js';?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>