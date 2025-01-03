<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Dashboard Dosen</h4>
                <p class="text-center">Selamat datang di halaman tugas akhir Anda.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Bimbingan Aktif</h5>
                        <p><?php echo $bimbinganAktif; ?> Sesi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Nilai Sidang</h5>
                        <p><?php echo $nilaiCount; ?> Sidang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Notifikasi</h5>
                        <p><?php echo $notifikasiCount; ?> Notifikasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
