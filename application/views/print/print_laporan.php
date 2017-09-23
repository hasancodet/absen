<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SATE | Sistem Absensi Terintegrasi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/bootstrap/css/bootstrap.min.css';?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/font-awesome/css/font-awesome.min.css';?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/ionicons/css/ionicons.min.css';?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/dist/css/AdminLTE.min.css';?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/dist/css/skins/_all-skins.min.css';?>">
    <!-- Data Tables -->
    <link rel="stylesheet" href="<?php echo base_url().'asset/AdminLTE/plugins/datatables/datatables.bootstrap.css';?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
      th, td {
        padding: 3px;
      }
    </style>
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-university"></i> KOMSI UGM
              <small class="pull-right">Date: <?php date_default_timezone_set('Asia/Jakarta');echo date("d m Y");?></small>
            </h2>
          <div class="col-xs-12">
            <?php foreach ($jadwal->result() as $row) { ?>
              <div class="col-md-4">
                <table class="table">
                  <tr>
                    <td><label>Mata Kuliah</label></td>
                    <td>:</td>
                    <td><label><?php echo $row->mata_kuliah; ?></label></td>
                  </tr>
                  <tr>
                    <td><label>Hari</label></td>
                    <td>:</td>
                    <td><label><?php echo $row->hari; ?></label></td>
                  </tr>
                  <tr>
                    <td><label>Jam</label></td>
                    <td>:</td>
                    <td><label><?php echo $row->jam; ?></label></td>
                  </tr>
                </table>
              </div>
            <?php } ?>
</br></br></br></br></br></br></br>
              <div>
                <table style="width:100%" border="1">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <?php $i=1; 
                        foreach ($tanggal->result() as $row) { ?>
                      <th><?php echo  $i ;?></th>
                      <?php $i++;} ?>
                      <th>Jumlah pertemuan</th>
                      <th>Jumlah presensi</th>
                      <th>Presentase</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php  foreach ($statusBerangkatMahasiswa as $row) { ?>
                    <tr>
                      <td><?php echo $row['nim']; ?></td>
                      <td><?php echo $row['nama_mahasiswa']; ?></td>
                      <?php 
                          for($i=0; $i < count($row['status']) ; $i++){
                            $status = $row['status'][$i];
                            if($status=='hadir'){
                              echo "<td>".$status."</td>";
                            }else{
                              echo "<td style='color:red;'>".$status."</td>";
                            }
                          }
                        ?>
                      <td><?php echo $row['jumlah_pertemuan'] ;?></td>
                      <td><?php echo $row['jumlah_presensi'] ;?></td>
                      <td><?php echo $row['presentase']." %" ;?></td>
                      <?php $persen = $row['presentase'];
                            if ($persen >= 75 ) {
                              echo "<td>MEMENUHI</td>";
                            }else{
                              echo "<td style='color:red'>TIDAK MEMENUHI</td>";
                            }
                             ?>
                      
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
          </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'asset/AdminLTE/dist/js/app.min.js';?>"></script>
  </body>
</html>
