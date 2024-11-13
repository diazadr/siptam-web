<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Jadwal Sidang</h4>
            <form action="<?php echo BASE_URL; ?>penguji/jadwal_siding/update/<?php echo $data['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $data['tanggal']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" value="<?php echo $data['waktu']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tempat">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $data['tempat']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="penguji_id">Penguji</label>
                    <input type="text" class="form-control" id="penguji_id" name="penguji_id" value="<?php echo $data['penguji_id']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>