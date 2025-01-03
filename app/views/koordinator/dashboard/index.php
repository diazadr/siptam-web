<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Dashboard Koordinator</h4>
                <p class="text-center">Kelola seluruh aktivitas tugas akhir mahasiswa.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Kegiatan</h5>
                        <p><?php echo $kegiatanCount; ?> Kegiatan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Proposal Menunggu</h5>
                        <p><?php echo $proposalPendingCount; ?> Proposal</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Jadwal Sidang/Seminar</h5>
                        <p><?php echo $jadwalCount; ?> Jadwal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
