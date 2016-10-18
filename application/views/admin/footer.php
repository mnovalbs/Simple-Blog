</div>
<!-- /#page-wrapper -->

  </div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/admin'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/data/morris-data.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script src="<?php echo base_url('assets/admin'); ?>/dist/js/jquery.are-you-sure.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/dist/js/sb-admin-2.js"></script>
<script>
  $(document).ready(function() {
      $('.dataTable').DataTable({
          responsive: true
      });
      $("#unsave-form").areYouSure({
        message: 'Ada beberapa perubahan yang belum disimpan. Yakin ingin keluar dari halaman ini?'
      });

      $(".do_edit").click(function(){
        // $(".widget-content .hilang").slideUp(200);
        $(this).parents(".widget").children(".widget-content").children('.hilang').slideToggle(200);
      });
  });
  </script>

</body>

</html>
