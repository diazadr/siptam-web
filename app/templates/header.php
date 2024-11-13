<?php
define('BASE_URL', '/siptam/');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPTAM</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>public/assets/images/logo-polman.svg" />
</head>
<body>
    <div class="container-scroller">
        <?php include 'app/templates/navbar.php'; ?>
        <div class="container-fluid ">
            <?php include 'app/templates/sidebar.php'; ?>
