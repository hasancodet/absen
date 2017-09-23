      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url().'asset/AdminLTE/dist/img/user2-160x160.jpg';?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>ADMIN</p>
              <!-- Status -->
              <i class="fa fa-circle text-success"></i> Online
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="<?= base_url().'home/index';?>"><i class="fa fa-home"></i> <span>Home</span></a><i class="fa fa-angle-left pull-right"></i></li>
            <li><a href="<?= base_url().'home/jadwalHariIni';?>"><i class="fa fa-calendar"></i> <span>Jadwal Kuliah Hari ini</span></a><i class="fa fa-angle-left pull-right"></i></li>
            <!-- <li><a href="<?= base_url().'home/jadwal';?>"><i class="fa fa-reorder"></i> <span>Jadwal Kuliah</span></a><i class="fa fa-angle-left pull-right"></i></li> -->
            <li><a href="<?= base_url().'home/laporan';?>"><i class="fa fa-print"></i><span>Laporan Presensi Mahasiswa</span></a><i class="fa fa-angle-left pull-right"></i></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-gear"></i> <span>Pengaturan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url().'home/ruang';?>"><i class="fa fa-cubes"></i><span>Pengaturan Ruang</span></a></li>
              </ul>
            </li>
            <!-- <li><a href="<?= base_url().'home/fingerprint';?>"><i class="fa fa-users"></i><span>Lihat Fingerprint</span></a></li>
             
            <li class="treeview">
              <a href="#"><i class="fa fa-gear"></i> <span>Presensi</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url().'home/jadwalEdit';?>"><i class="fa fa-circle-o"></i>Edit Presensi Mahasiswa</a></li>
              </ul>
            </li>
            -->

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
        <!-- <div id="load_content">
          loading
        </div> -->
      </aside>