<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Registrasi</h4>
                    <div class="form-group">
                        <label for="mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="mahasiswa" value="<?php echo $registrasi['nim']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" value="<?php echo $registrasi['nama_kegiatan']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" value="<?php echo ucfirst($registrasi['status']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti Pembayaran</label>
                        <a href="<?php echo $registrasi['payment_proof']; ?>" target="_blank" class="btn btn-info btn-sm">Lihat Bukti Pembayaran</a>
                    </div>
                    <a href="<?php echo BASE_URL; ?>registrasi" class="btn btn-light">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
