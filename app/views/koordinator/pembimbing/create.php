<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Pembimbing</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>pembimbing/create" class="forms-sample">
                        <div class="form-group">
                            <label for="mahasiswa_id">Mahasiswa</label>
                            <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                <?php foreach ($mahasiswa as $item): ?>
                                    <option value="<?php echo $item['mahasiswa_id']; ?>"><?php echo $item['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kegiatan_id">Kegiatan</label>
                            <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                                <option value="">-- Pilih Kegiatan --</option>
                                <?php foreach ($kegiatan as $item): ?>
                                    <option value="<?php echo $item['kegiatan_id']; ?>"><?php echo $item['nama_kegiatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen_id">Dosen Pembimbing</label>
                            <select class="form-control" id="dosen_id" name="dosen_id" required>
                                <option value="">-- Pilih Dosen --</option>
                                <?php foreach ($dosen as $item): ?>
                                    <option value="<?php echo $item['user_id']; ?>"><?php echo $item['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Peran</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="pembimbing utama">Pembimbing Utama</option>
                                <option value="pembimbing pendamping">Pembimbing Pendamping</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>/pembimbing" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
