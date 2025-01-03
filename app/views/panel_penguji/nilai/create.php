<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah/Perbarui Nilai</h4>
                    <form method="POST" action="<?php echo isset($nilai) ? BASE_URL . "/nilai/edit/{$nilai['nilai_id']}" : BASE_URL . "/nilai/create"; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="jadwal_id">Jadwal</label>
                            <select class="form-control" id="jadwal_id" name="jadwal_id" required>
                                <option value="">-- Pilih Jadwal --</option>
                                <?php foreach ($jadwal as $item): ?>
                                    <option value="<?php echo $item['jadwal_id']; ?>" <?php echo isset($nilai) && $nilai['jadwal_id'] == $item['jadwal_id'] ? 'selected' : ''; ?>>
                                        <?php echo $item['type'] . ' - ' . $item['tanggal']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="penguji_id">Penguji</label>
                            <select class="form-control" id="penguji_id" name="penguji_id" required>
                                <option value="">-- Pilih Penguji --</option>
                                <?php foreach ($penguji as $item): ?>
                                    <option value="<?php echo $item['penguji_id']; ?>" <?php echo isset($nilai) && $nilai['penguji_id'] == $item['penguji_id'] ? 'selected' : ''; ?>>
                                        <?php echo $item['nama_penguji']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="score">Nilai</label>
                            <input type="number" step="0.01" class="form-control" id="score" name="score" value="<?php echo isset($nilai) ? $nilai['score'] : ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="comments">Komentar</label>
                            <textarea class="form-control" id="comments" name="comments" rows="4"><?php echo isset($nilai) ? $nilai['comments'] : ''; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>/nilai" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
