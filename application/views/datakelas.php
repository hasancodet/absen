<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sistem Informasi Absensi KOMSI UGM
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Kelas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kelas</th>
                        <th>Dosen</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Lihat Kelas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Alpro 1 - A</td>
                        <td>Ali</td>
                        <td>48</td>
                        <td>Senin</td>
                        <td>11.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>Alpro 1 - B</td>
                        <td>Ali</td>
                        <td>49</td>
                        <td>Senin</td>
                        <td>13.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>Jarkom 1 - A</td>
                        <td>Poniman</td>
                        <td>27</td>
                        <td>Selasa</td>
                        <td>13.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>Jarkom 1 - B</td>
                        <td>Poniman</td>
                        <td>29</td>
                        <td>Selasa</td>
                        <td>11.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>PBO - A</td>
                        <td>Endang</td>
                        <td>42</td>
                        <td>Kamis</td>
                        <td>13.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>PBO - B</td>
                        <td>Endang</td>
                        <td>45</td>
                        <td>Minggu</td>
                        <td>15.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>PIK - A</td>
                        <td>Kunto</td>
                        <td>47</td>
                        <td>Rabu</td>
                        <td>09.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                      <tr>
                        <td>PIK - B</td>
                        <td>Kunto</td>
                        <td>42</td>
                        <td>Rabu</td>
                        <td>11.00</td>
                        <td><a href="<?= base_url().'index.php/home/kelasalpro';?>"><button class="btn btn-sm success">Lihat</button></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>