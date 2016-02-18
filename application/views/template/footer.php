<!-- Main Footer -->
      
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>
      
    </div>


    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url().'asset/AdminLTE/bootstrap/js/bootstrap.min.js';?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/datatables/jquery.dataTables.min.js';?>"></script>
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js';?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url().'asset/AdminLTE/plugins/fastclick/fastclick.min.js';?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url().'asset/AdminLTE/dist/js/app.min.js';?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url().'asset/AdminLTE/dist/js/demo.js';?>"></script>
    
    <!-- jQuery UI 1.11.4 -->
    <!-- // <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

    <!--JS Edit Absensi-->
    <script type="text/javascript">
      $('#editAbsensi').on('shown.bs.modal', function(e) {
              var id_absensi = $(e.relatedTarget).data('id_absensi');
              $(e.currentTarget).find('input[name="id_absensi"]').val(id_absensi);
              var status = $(e.relatedTarget).data('status');
              $(e.currentTarget).find('input[name="status"]').val(status);
              var id_jadwal = $(e.relatedTarget).data('id_jadwal');
              $(e.currentTarget).find('input[name="id_jadwal"]').val(id_jadwal);
              var id_mata_kuliah = $(e.relatedTarget).data('id_mata_kuliah');
              $(e.currentTarget).find('input[name="id_mata_kuliah"]').val(id_mata_kuliah);
              });
    </script>
  </body>
</html>