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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Mata Kuliah</th>
                        <th>Jam</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($absen->result() as $row) { ?>
                      <tr>
                        <td><?php 
                            echo $row->tanggal;
                          ?>
                        </td>
                        <td><?php echo $row->nama_mahasiswa ;?></td>
                        <td><?php echo $row->nim ;?></td>
                        <td><?php echo $row->mata_kuliah ;?></td>
                        <td><?php echo $row->jam ;?></td>
                        <td><?php 
                          $status = $row->status ;
                          if($status == "hadir"){
                            echo "HADIR";
                          }
                          elseif ($status=="izin")
                          {
                            echo "IZIN";
                          }
                          else
                          {
                            echo "ALFA";
                          }
                        ?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>