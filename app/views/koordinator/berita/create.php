<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Berita</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>berita/create" class="forms-sample">
                        <div class="form-group">
                            <label for="title">Judul Berita</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul Berita" required>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Isi Berita</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Tuliskan isi berita" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>berita" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
