<?php
function section($result) {
    if (!$result) {
        echo "<p>Data tidak ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Mahasiswa</h4>
                <div class="mb-3">
                    <a href="<?php echo BASE_URL; ?>mahasiswa/create" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Mahasiswa
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Semester Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['username'] ?? 'Belum ada akun'; ?></td>
                                    <td><?php echo $row['jurusan']; ?></td>
                                    <td><?php echo $row['semester_active']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>mahasiswa/edit/<?php echo $row['mahasiswa_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>mahasiswa/delete/<?php echo $row['mahasiswa_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
}
include 'app/templates/master.php';
?>
