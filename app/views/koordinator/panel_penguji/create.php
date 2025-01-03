<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Penguji</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/panel_penguji/create" class="forms-sample">
                        <div class="form-group">
                            <label for="jadwal_id">Jadwal</label>
                            <select class="form-control" id="jadwal_id" name="jadwal_id" required>
                                <option value="">-- Pilih Jadwal --</option>
                                <?php foreach ($jadwal as $item): ?>
                                    <option value="<?php echo $item['jadwal_id']; ?>"><?php echo $item['type'] . ' - ' . $item['tanggal']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dosen_id">Dosen Penguji</label>
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
                                <option value="penguji utama">Penguji Utama</option>
                                <option value="penguji pendamping">Penguji Pendamping</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_primary_pembimbing">Pembimbing Utama</label>
                            <select class="form-control" id="is_primary_pembimbing" name="is_primary_pembimbing">
                                <option value="1">Ya</option>
                                <option value="0" selected>Tidak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>/panel_penguji" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
