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
                  <h3 class="box-title">Edit Presensi Berdasarkan Kelas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Semester</th>
                          <th>Mata Kuliah</th>
                          <th>Nama Dosen</th>
                          <th>Ruang</th>
                          <th>Hari</th>
                          <th>Jam</th>
                          <th>detail</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($jadwal->result() as $row) { ?>
                        <tr>
                          <td><?= $row->semester ;?> </td>
                          <td><?= $row->mata_kuliah ;?> </td>
                          <td><?= $row->nama_dosen ;?></td>
                          <td><?= $row->ruang ;?></td>
                          <td><?= $row->hari ;?></td>
                          <td><?= $row->jam ;?></td>
                          <td>
                            <a href="<?= base_url().'home/absenKelasEdit/'.$row->id_jadwal.'/'.$row->id_mata_kuliah;?>">edit</a>
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