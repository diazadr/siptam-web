<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Log Bimbingan</h4>
                    <p class="card-description text-center">Form untuk menambahkan data Log Bimbingan</p>
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
                            <label for="id_dosen">ID Dosen</label>
                            <select id="id_dosen" name="id_dosen" class="form-control" required>
                                <option value="" disabled selected>Pilih ID Dosen</option>
                                <?php foreach ($dosen_list as $dosen): ?>
                                    <option value="<?php echo $dosen['id']; ?>"><?php echo $dosen['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan">catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" placeholder="catatan" required>
                        </div>
                
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" required>
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