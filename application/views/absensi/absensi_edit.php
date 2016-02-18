<!--Content Wrapper. Contains page content -->
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
                <?php foreach ($jadwal->result() as $row) { ?>
                  <div class="col-md-4">
                  <table class="table">
                    <tr>
                      <td><label>Mata Kuliah</label></td>
                      <td>:</td>
                      <td><label><?php echo $row->mata_kuliah; ?></label></td>
                    </tr>
                    <tr>
                      <td><label>Ruang</label></td>
                      <td>:</td>
                      <td><label><?php echo $row->ruang; ?></label></td>
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
                      <td><label>IP Address Fingerprint</label></td>
                      <td>:</td>
                      <td><label><?php echo $row->ip_address; ?></label></td>
                    </tr>
                  </table>
                  </div>
                  <?php } ?>
                  </br></br></br></br></br></br></br></br></br></br></br></br></br>
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
                        <?php for($i=0; $i < count($row['status']) ; $i++) { ?>
                        <td>
                          <?php echo $row['status'][$i];?>
                          <button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#editAbsensi'
                          data-id_absensi='<?php echo $row['id_absensi'][$i]; ?>'
                          data-status='<?php echo $row['status'][$i]; ?>'
                          data-id_jadwal='<?php echo $row['id_jadwal']; ?>'
                          data-id_mata_kuliah='<?php echo $row['id_mata_kuliah']; ?>'>
                          <i class='fa fa-edit'></i></button>
                        </td>
                        <?php } ?>
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
       <!-- Modal edit absensi-->
      <div class="modal fade" id="editAbsensi" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Absensi</h4>
                  </div>
                  <form method="post" action="<?= base_url().'absensi/editAbsensi';?>" >
                  <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-4">
                          <select class="form-control input-sm" name="status">
                            <option selected=""></option>
                            <option value="hadir">hadir</option>
                            <option value="izin">izin</option>
                            <option value="alfa">alfa</option>
                          </select>
                          <input class="form-control" type="hidden" name="id_absensi" >
                          <input class="form-control" type="hidden" name="id_jadwal" >
                          <input class="form-control" type="hidden" name="id_mata_kuliah" >  
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
      <!--Akhir modal -->
      
      
                        
      <!--
      <button class='btn btn-primary btn-xs' data-toggle='modal' data-target='#editAbsensi'
                                 data-id_absensi='<?php echo $row['id_absensi']; ?>'</button>
<?php foreach ($status as $roww) { ?>
                          <td><?php echo $roww;?></td>
                        <?php }?>
     