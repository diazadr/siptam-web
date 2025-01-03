</div> <!-- content-wrapper -->
</div> <!-- main-panel -->
</div> <!-- page-body-wrapper -->
</div>


  <!-- container-scroller -->


  <!-- plugins:js -->
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo BASE_URL; ?>public/assets/js/off-canvas.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/template.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/settings.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo BASE_URL; ?>public/assets/js/dashboard.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/Chart.roundedBarCharts.js"></script>


  <!-- End custom js for this page-->
  </body>

  </html>

  <script>
    $(document).ready(function() {
      // Menutup submenu lainnya ketika submenu dibuka
      $('#sidebar .nav-link[data-toggle="collapse"]').on('click', function() {
        var target = $(this).attr('href'); // Mendapatkan id target submenu
        if ($(target).hasClass('show')) {
          $(target).collapse('hide');
        } else {
          $('#sidebar .collapse').collapse('hide'); // Menutup semua submenu lainnya
          $(target).collapse('show'); // Menampilkan submenu yang dipilih
        }
      });
    });
  </script>