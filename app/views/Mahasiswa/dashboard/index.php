<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Dashboard Mahasiswa</h4>
                <p class="text-center">Selamat datang di sistem tugas akhir.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Kegiatan Aktif</h5>
                        <p><?php echo $kegiatanAktif; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Proposal Diajukan</h5>
                        <p><?php echo $proposalCount; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Jadwal Mendatang</h5>
                        <p><?php echo $jadwalCount; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
