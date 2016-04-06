<!-- Content Wrapper. Contains page content -->
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
                  <h3 class="box-title">Absensi real time <?php date_default_timezone_set('Asia/Jakarta'); echo date("H:i:s");?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th aria-sort="descending" aria-label="Tanggal: activate to sort column ascending" style="width: 147px;" colspan="1" rowspan="1" aria-controls="example1" tabindex="0" class="sorting_desc">Tanggal</th>
                        <th>Mata Kuliah</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jam</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($absen->result_array() as $row) { ?>
                      <tr>
                        <td><?php echo $row['tanggal'];?></td>
                        <td><?php echo $row['mata_kuliah'] ;?></td>
                        <td><?php echo $row['nim'] ;?></td>
                        <td><?php echo $row['nama_mahasiswa'] ;?></td>
                        <td><?php echo $row['jam'] ;?></td>
                        <?php 
                            $status = $row['status'];
                            if($status=='hadir'){
                              echo "<td>".$status."</td>";
                            }else{
                              echo "<td style='color:red;'>".$status."</td>";
                            }
                          }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>