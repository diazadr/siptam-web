<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Verifikasi Registrasi</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/registrasi/verify/<?php echo $registrasi['registrasi_id']; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="status">Status Verifikasi</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="disetujui">Disetujui</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>/registrasi" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
