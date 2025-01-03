<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Unggah Dokumen Tugas Akhir</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/dokumen/create" class="forms-sample" enctype="multipart/form-data">
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
                            <label for="dokumen_type">Jenis Dokumen</label>
                            <select class="form-control" id="dokumen_type" name="dokumen_type" required>
                                <option value="proposal">Proposal</option>
                                <option value="laporan">Laporan</option>
                                <option value="revisi">Revisi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file_path">File</label>
                            <input type="file" class="form-control" id="file_path" name="file_path" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Unggah</button>
                        <a href="<?php echo BASE_URL; ?>/dokumen" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
