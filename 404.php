<?php
define('BASE_URL', '/siptam/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIPTAM</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>public/assets/images/logo-polman.svg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>ERROR</h2>
                <h3 class="font-weight-light">Periksa kembali route nya ya</h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="<?php echo BASE_URL; ?>">Kembali</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">Copyright &copy; 2024 All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo BASE_URL; ?>public/assets/js/off-canvas.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/template.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/settings.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>