<?php
function section($result)
{
    if (empty($result)) {
        echo "<p>Data tidak ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Dosen</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $no = 1; foreach ($result as $row): ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['no_telepon']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>dosen/edit/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>dosen/hapus/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php
}
include 'app/templates/master.php';
