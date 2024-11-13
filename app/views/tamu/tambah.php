<?php include 'app/templates/header.php'; ?>

<h4 class="text-center my-4">Tambah Tamu</h4>

<div class="container">
    <form method="POST" action="<?php echo BASE_URL; ?>tamu/tambah">
        <div class="mb-3">
            <label for="nama_tamu" class="form-label">Nama Tamu</label>
            <input type="text" id="nama_tamu" name="nama_tamu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kontak_tamu" class="form-label">Kontak Tamu</label>
            <input type="text" id="kontak_tamu" name="kontak_tamu" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat_tamu" class="form-label">Alamat Tamu</label>
            <input type="text" id="alamat_tamu" name="alamat_tamu" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo BASE_URL; ?>tamu" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include 'app/templates/footer.php'; ?>
