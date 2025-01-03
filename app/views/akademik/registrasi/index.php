<?php
function section($result) {
    if (!$result) {
        echo "<p>Belum ada data registrasi ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Registrasi Mahasiswa</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mahasiswa</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['jurusan']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                    <td><?php echo $row['registrasi_date']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>registrasi/detail/<?php echo $row['registrasi_id']; ?>" class="btn btn-info btn-sm">Detail</a>
                                        <a href="<?php echo BASE_URL; ?>registrasi/update/<?php echo $row['registrasi_id']; ?>" class="btn btn-success btn-sm">Verifikasi</a>
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
