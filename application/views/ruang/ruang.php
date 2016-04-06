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
                  <h3 class="box-title">Daftar Ruang Kelas</h3>
                  <br>
                  <h3><button class="btn btn-primary">Tambah Kelas</button></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Id Ruang</th>
                          <th>Ruang</th>
                          <th>IP Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($ruang->result_array() as $row) { ?>
                        <tr>
                          <td><?= $row['id_ruang'] ;?></td>
                          <td><?= $row['nama_ruang'] ;?></td>
                          <td><?= $row['ip_address'] ;?></td>
                          <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editRuang"
                              data-id_ruang="<?= $row['id_ruang'];?>" 
                              data-nama_ruang="<?= $row['nama_ruang'];?>"
                              data-ip_address="<?= $row['ip_address'];?>">Edit</button>
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
      <!-- modal -->
      <div class="modal fade" id="editRuang" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Buka Kelas</h4>
                  </div>
                  <form method="post" action="<?= base_url().'ruang/editRuang';?>" >
                  <div class="modal-body">
                      <div class="form-group">
                        <input class="form-control" name="id_ruang" >
                        <input class="form-control" name="nama_ruang">
                        <input class="form-control" name="ip_address">  
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>