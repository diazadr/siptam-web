<?php
function section($result, $currentRole)
{ // Tambahkan parameter untuk role pengguna saat ini
    if (!$result) {
        echo "<p>Data tidak ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pengguna</h4>
                <?php if ($currentRole === 'admin'): // Periksa apakah pengguna adalah admin 
                ?>
                    <div class="mb-3">
                        <a href="<?php echo BASE_URL; ?>user/create" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Tambah Pengguna
                        </a>
                    </div>
                  

                <?php endif; ?>
                <div class="mb-3">
                        <form method="get" action="">
                            <label for="roleFilter" class="form-label">Filter Role:</label>
                            <select name="role" id="roleFilter" class="form-select" onchange="this.form.submit()">
                                <option value="" <?php echo !isset($_GET['role']) ? 'selected' : ''; ?>>Semua</option>
                                <option value="admin" <?php echo isset($_GET['role']) && $_GET['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                <option value="mahasiswa" <?php echo isset($_GET['role']) && $_GET['role'] === 'mahasiswa' ? 'selected' : ''; ?>>Mahasiswa</option>
                                <option value="dosen" <?php echo isset($_GET['role']) && $_GET['role'] === 'dosen' ? 'selected' : ''; ?>>Dosen</option>
                                <option value="koordinator" <?php echo isset($_GET['role']) && $_GET['role'] === 'koordinator' ? 'selected' : ''; ?>>Koordinator</option>
                                <!-- Tambahkan opsi lain jika ada -->
                            </select>
                        </form>
                    </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <?php if ($currentRole === 'admin'): // Tampilkan kolom Aksi hanya untuk admin 
                                ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo ucfirst($row['role']); ?></td>
                                    <?php if ($currentRole === 'admin'): // Tampilkan tombol aksi hanya untuk admin 
                                    ?>
                                        <td>
                                            <a href="<?php echo BASE_URL; ?>user/edit/<?php echo $row['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?php echo BASE_URL; ?>user/delete/<?php echo $row['user_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                        </td>
                                    <?php endif; ?>
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