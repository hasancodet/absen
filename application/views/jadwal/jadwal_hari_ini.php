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
                  <h3 class="box-title">Daftar Kelas Hari Ini</h3>
                  <!-- <form method="post" action="<?= base_url().'absensi/isiabsensi';?>">
                      <button class="btn btn-primary pull-right" type="submit">Buka Kelas</button>
                  </form> -->
                </div><!-- /.box-header -->
                <?php echo $this->session->flashdata('message_name');?>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Jam</th>
                          <th>Mata Kuliah</th>
                          <th>Nama Dosen</th>
                          <th>Hari</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($jadwal->result_array() as $row) { ?>
                        <tr>
                          <td><?= $row['jam'] ;?></td>
                          <td><?= $row['mata_kuliah'] ;?> </td>
                          <td><?= $row['nama_dosen'] ;?></td>
                          <td><?= $row['hari'] ;?></td>
                          <td>
                            <button class='btn btn-primary btn-sm btnBuka' data-toggle='modal' data-target='#bukaKelas'
                              data-id_mata_kuliah='<?php echo $row['id_mata_kuliah']; ?>'
                              data-id_jadwal='<?php echo $row['id_jadwal']; ?>'>Buka Kelas</button> 
                            <button class='btn btn-danger btn-sm'data-toggle='modal' data-target='#tutupKelas'
                              data-id_mata_kuliah='<?php echo $row['id_mata_kuliah']; ?>'
                              data-id_jadwal='<?php echo $row['id_jadwal']; ?>'>Tutup Kelas</button></td>
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
      <!--modal-->
      <div class="modal fade" id="bukaKelas" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Buka Kelas</h4>
                  </div>
                  <form method="post" action="<?= base_url().'Absensi/bukaKelas';?>" >
                  <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Pilih Ruang</label>
                        <div class="col-sm-4">
                          <select class="form-control input-sm" name="id_ruang" id="idRuang">
                            <?php foreach ($ruang->result_array() as $row) { ?>
                              <option value="<?= $row['id_ruang'];?>"><?= $row['nama_ruang'];?></option>
                            <?php }?>
                          </select>
                        </div>
                        <input class="form-control" name="id_jadwal" type="hidden">
                        <input class="form-control" name="id_mata_kuliah" type="hidden">  
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btnBukaKelas">Buka Kelas</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="modal fade" id="tutupKelas" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tutup Kelas</h4>
                  </div>
                  <form method="post" action="<?= base_url().'absensi/tutupKelas';?>" >
                  <div class="modal-body">
                      <div class="form-group">
                        <input class="form-control" id="ruangTutup" value="">
                        <input class="form-control" name="id_jadwal" id="ruangTutup">
                        <input class="form-control" name="id_mata_kuliah">  
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-danger btnTutupKelas">Tutup Kelas</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!--Akhir modal -->