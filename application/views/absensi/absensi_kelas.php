<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sistem Informasi Presensi KOMSI UGM
            <small></small>
          </h1>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Presensi Mahasiswa Per Tanggal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                  </br></br></br></br></br></br></br></br>
                <div style="overflow:auto;">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <?php foreach ($tanggal->result() as $row) { ?>
                        <th><?php echo  $row->tanggal ;?></th>
                        <?php } ?>
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
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!--
<?php foreach ($status as $roww) { ?>
                          <td><?php echo $roww;?></td>
                        <?php }?>
      -->
