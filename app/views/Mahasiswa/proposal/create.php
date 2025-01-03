<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Proposal</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/proposal/create" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Judul Proposal</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Proposal" required>
                        </div>
                        <div class="form-group">
                            <label for="abstract">Abstrak</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="5" placeholder="Tuliskan abstrak proposal Anda" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_path">Unggah Proposal</label>
                            <input type="file" class="form-control" id="file_path" name="file_path" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>/proposal" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
