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
                  <h3 class="box-title">Data Presentase Absensi Mata Kuliah</h3>
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
                    <tr>
                      <td>
                        <form method="post" action="<?php echo base_url().'home/absenKelas';?>">
                          <button class="btn btn-primary">Detail Presensi Per Mahasiswa</button>
                          <input value="<?php echo $row->id_mata_kuliah;?>" name="id_mata_kuliah" type="hidden"></input>
                          <input value="<?php echo $row->id_jadwal;?>" name="id_jadwal" type="hidden"></input>                          
                        </form>
                      </td>
                    </tr>
                  </table>
                  </div>
                  <?php } ?>
                  </br>
                  <div class="col-md-12">
                   <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jumlah Pertemuan</th>
                        <th>Jumlah Kehadiran</th>
                        <th>Presentase Kehadiran</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($presensi as $row) { ?>
                      <tr>
                        <td><?php echo $row['nim'] ;?></td>
                        <td><?php echo $row['nama_mahasiswa'] ;?></td>
                        <td><?php echo $row['jumlah_pertemuan']; ?></td>
                        <td><?php echo $row['jumlah_presensi']; ?></td>
                        <td><?php echo $row['presentase']." %"; ?></td>
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
<?php
// foreach ($presensi->result() as $row) {
// echo $row->jumlah_presensi;
//}
?>