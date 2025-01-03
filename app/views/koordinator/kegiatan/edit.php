<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Kegiatan</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>kegiatan/edit/<?php echo $kegiatan['kegiatan_id']; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $kegiatan['jurusan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $kegiatan['nama_kegiatan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $kegiatan['start_date']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $kegiatan['end_date']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="aktif" <?php echo ($kegiatan['status'] === 'aktif') ? 'selected' : ''; ?>>Aktif</option>
                                <option value="tidak aktif" <?php echo ($kegiatan['status'] === 'tidak aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="<?php echo BASE_URL; ?>kegiatan" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
