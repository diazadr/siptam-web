<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Seminar</h4>
                    <p class="card-description text-center">Form untuk menambahkan data Seminar</p>
                    <form method="POST" action="" class="forms-sample">
                        <div class="form-group">
                            <label for="id_tugas_akhir">Judul tugas akhir</label>
                            <select id="id_tugas_akhir" name="id_tugas_akhir" class="form-control" required>
                                <option value="" disabled selected>Pilih Tugas Akhir</option>
                                <?php foreach ($TAlist as $tugas_akhir): ?>
                                    <option value="<?php echo $tugas_akhir['id']; ?>"><?php echo $tugas_akhir['judul']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu">waktu:</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" placeholder="waktu" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat">tempat</label>
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat" required>
                        </div>   

                        <div class="form-group">
                            <label for="status">status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option selected disabled>status</option>
                                <option value="Terjadwal">Terjadwal</option>
                                <option value="Selesai">Selesai</option>
                            </select>
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