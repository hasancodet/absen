<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sistem Informasi Absensi Sekolah Vokasi
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
                <?php foreach ($jadwal->result_array() as $row) { ?>
                  <div class="col-md-4">
                  <table class="table">
                    <tr>
                      <td><label>Mata Kuliah</label></td>
                      <td>:</td>
                      <td><label><?php echo $row['mata_kuliah']; ?></label></td>
                    </tr>
                    <tr>
                      <td><label>Hari</label></td>
                      <td>:</td>
                      <td><label><?php echo $row['hari']; ?></label></td>
                    </tr>
                    <tr>
                      <td><label>Jam</label></td>
                      <td>:</td>
                      <td><label><?php echo $row['jam']; ?></label></td>
                    </tr>
                    <tr>
                      <td><a href="<?= base_url().'printt/printLaporan/'.$row['id_jadwal'].'/'.$row['id_mata_kuliah'];?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Print</button></a></td>
                    </tr>
                  </table>
                  </div>
                  <?php } ?>
                  </br></br></br></br></br></br></br></br></br></br></br>
                <div style="overflow:auto;">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <?php foreach ($tanggal->result() as $row) { ?>
                        <th><?php echo  $row->tanggal ;?></th>
                        <?php } ?>
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
                              if ($persen > 74 ) {
                                echo "<td>Memenuhi</td>";
                              }else{
                                echo "<td style='color:red;'>Tidak Memenuhi</td>";
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
      <?php foreach ($presensi as $row) { ?>
                      <tr>
                        <td><?php echo $row['nim'] ;?></td>
                        <td><?php echo $row['nama_mahasiswa'] ;?></td>
                        <td><?php echo $row['jumlah_pertemuan']; ?></td>
                        <td><?php echo $row['jumlah_presensi']; ?></td>
                        <td><?php echo $row['presentase']." %"; ?></td>
                      </tr>
                    <?php } ?> -->