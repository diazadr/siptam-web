<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Tugas Akhir</h4>
                    <p class="card-description text-center">Form untuk menambahkan data Tugas Akhir</p>
                    <form method="POST" action="" class="forms-sample">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label for="id_mahasiswa">ID_Mahasiswa</label>
                            <select id="id_mahasiswa" name="id_mahasiswa" class="form-control" required>
                                <option value="" disabled selected>Pilih ID Dosen</option>
                                <?php foreach ($mahasiswa_list as $mahasiswa): ?>
                                    <option value="<?php echo $mahasiswa['id']; ?>"><?php echo $mahasiswa['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pembimbing">id_pembimbing</label>
                            <select id="id_pembimbing" name="id_pembimbing" class="form-control" required>
                                <option value="" disabled selected>Pilih ID Dosen</option>
                                <?php foreach ($dosen_list as $pembimbing): ?>
                                    <option value="<?php echo $pembimbing['id']; ?>"><?php echo $pembimbing['nama']; ?> &nbsp;=&nbsp;<?php echo $pembimbing['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_penguji">id_penguji</label>
                            <select id="id_penguji" name="id_penguji" class="form-control" required>
                                <option value="" disabled selected>Pilih ID Dosen</option>
                                <?php foreach ($dosen_list as $penguji): ?>
                                    <option value="<?php echo $penguji['id']; ?>"><?php echo $penguji['nama']; ?> &nbsp;=&nbsp;<?php echo $penguji['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option selected disabled>status</option>
                                <option value="Belum Diambil">Belum Diambil</option>
                                <option value="Proses">Proses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan:</label>
                            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" placeholder="tanggal_pengajuan" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai:</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="tanggal_pengajuan" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="index.php" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>