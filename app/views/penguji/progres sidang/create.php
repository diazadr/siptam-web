<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Progres Sidang</h4>
            <form action="store.php" method="POST">
                <div class="form-group">
                    <label for="jadwal_sidang_id">Jadwal Sidang</label>
                    <input type="text" class="form-control" id="jadwal_sidang_id" name="jadwal_sidang_id" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>