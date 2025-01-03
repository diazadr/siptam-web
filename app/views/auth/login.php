<?php
define('BASE_URL', '/siptam/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIPTAM - Login</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>public/assets/images/logo-polman.svg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo BASE_URL; ?>public/assets/images/logo-polman.png" alt="logo">
              </div>
              <h4>Selamat Datang!</h4>
              <h6 class="font-weight-light">Silakan masuk untuk melanjutkan.</h6>

              <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                  <?php echo $error_message; ?>
                </div>
              <?php endif; ?>

              <form class="pt-3" method="POST" action="<?php echo BASE_URL; ?>auth/login">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Masukan Username/NIM/NRP" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo BASE_URL; ?>public/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/off-canvas.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/template.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/settings.js"></script>
  <script src="<?php echo BASE_URL; ?>public/assets/js/todolist.js"></script>
</body>

</html>
