<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
                <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
        </div>
    </div>

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>dashboard">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL; ?>berita">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Berita</span>
                </a>
            </li>

                     <!-- Menu untuk Koordinator -->
                     <?php if ($_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>admin/dashboard">
                        <i class="icon-briefcase menu-icon"></i>
                        <span class="menu-title">Dashboard Admin</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Manajemen Mahasiswa</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="user-management">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>mahasiswa">Daftar Mahasiswa</a>
                            </li>
        
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASE_URL; ?>mahasiswa/create">Tambah Mahasiswa</a>
                                </li>

                        </ul>
                    </div>
                </li>
               <?php endif; ?>


            <?php if (in_array($_SESSION['role'], [ 'koordinator'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>koordinator/dashboard">
                        <i class="icon-briefcase menu-icon"></i>
                        <span class="menu-title">Dashboard Koordinator</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Berita</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="user-management">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>koordinator/berita">Daftar Berita</a>
                            </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASE_URL; ?>berita/create">Tambah Berita</a>
                                </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>


            <!-- Menu untuk Admin -->
            <?php if (in_array($_SESSION['role'], ['admin', 'koordinator'])): ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Manajemen Pengguna</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="user-management">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>user">Daftar Pengguna</a>
                            </li>
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo BASE_URL; ?>user/create">Tambah Pengguna</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Menu untuk Mahasiswa -->
            <?php if ($_SESSION['role'] === 'mahasiswa'): ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tugas-akhir" aria-expanded="false" aria-controls="tugas-akhir">
                        <i class="icon-book menu-icon"></i>
                        <span class="menu-title">Tugas Akhir</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tugas-akhir">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>tugasakhir">Daftar Tugas Akhir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>tugasakhir/tambah">Tambah Tugas Akhir</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>

   

            <!-- Menu Umum -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#dokumen" aria-expanded="false" aria-controls="dokumen">
                    <i class="icon-folder menu-icon"></i>
                    <span class="menu-title">Dokumen</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="dokumen">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>dokumen">Daftar Dokumen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>dokumen/tambah">Tambah Dokumen</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>