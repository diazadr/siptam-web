<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Data Tugas Akhir</h4>
                    <p class="card-description text-center">Form untuk mengedit data Tugas Akhir</p>
                    <form method="POST" action="" class="forms-sample">
                        <div class="form-group">
                            <label for="judul">judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" value="<?php echo $tugas_akhir['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" value="<?php echo $tugas_akhir['deskripsi']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Nama mahasiswa</label>
                            <select name="id_mahasiswa" id="status" class="form-control" required>
                                <?php foreach ($mahasiswa_list as $mahasiswa): ?>
                                    <option value="<?php echo $mahasiswa['id']; ?>" <?php echo ($mahasiswa['id'] == $tugas_akhir['id_mahasiswa']) ? 'selected' : ''; ?>><?php echo $mahasiswa['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Dosen pembimbing</label>
                            <select name="id_pembimbing" id="status" class="form-control" required>
                                <?php foreach ($dosen_list as $pembimbing): ?>
                                    <option value="<?php echo $pembimbing['id']; ?>" <?php echo ($pembimbing['id'] == $tugas_akhir['id_pembimbing']) ? 'selected' : ''; ?>><?php echo $pembimbing['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Dosen penguji</label>
                            <select name="id_penguji" id="status" class="form-control" required>
                                <?php foreach ($dosen_list as $penguji): ?>
                                    <option value="<?php echo $penguji['id']; ?>" <?php echo ($penguji['id'] == $tugas_akhir['id_penguji']) ? 'selected' : ''; ?>><?php echo $penguji['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option disabled>status</option>
                                <option value="belum diambil" <?php echo ($tugas_akhir['status'] == 'belum diambil') ? 'selected' : ''; ?>>Belum diambil</option>
                                <option value="proses" <?php echo ($tugas_akhir['status'] == 'proses') ? 'selected' : ''; ?>>Proses</option>
                                <option value="selesai" <?php echo ($tugas_akhir['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengajuan">tanggal pengajuan</label>
                            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" placeholder="No Telepon" value="<?php echo $tugas_akhir['tanggal_pengajuan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_selesai">tanggal selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="No Telepon" value="<?php echo $tugas_akhir['tanggal_selesai']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="index.php" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>