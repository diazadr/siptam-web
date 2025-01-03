<?php



$userName = $_SESSION['username'];
$userRole = $_SESSION['role'];

include 'app/templates/header.php'; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Selamat Datang, <?= htmlspecialchars($userName); ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <?php if ($userRole === 'mahasiswa') : ?>
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body">
                                                <p class="mb-4">Mahasiswa</p>
                                                <p class="fs-30 mb-2"></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($userRole === 'baak') : ?>
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body">
                                                <p class="mb-4">Bagian Akademik</p>''
                                                <p class="fs-30 mb-2"></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($userRole === 'dosen_penguji') : ?>
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-dark-blue">
                                            <div class="card-body">
                                                <p class="mb-4">Dosen Penguji</p>
                                                <p class="fs-30 mb-2"></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php elseif ($userRole === 'dosen_pembimbing') : ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Dosen Pembimbing</p>
                                            <p class="fs-30 mb-2"></p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif ($userRole === 'koordinator_ta') : ?>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Koordinator TA</p>
                                            <p class="fs-30 mb-2"></p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Upsent Developer. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made by Absen Atas tanpa mahendranur</i></span>
        </div>
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://github.com/Upsent-Developer" target="_blank">Absen Atas</a></span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->



<?php include 'app/templates/footer.php'; ?>emi