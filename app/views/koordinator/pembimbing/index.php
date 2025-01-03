<?php
function section($result) {
    if (!$result) {
        echo "<p>Belum ada data pembimbing ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Pembimbing Mahasiswa</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mahasiswa</th>
                                <th>Jurusan</th>
                                <th>Pembimbing</th>
                                <th>Peran</th>
                                <th>Tanggal Penugasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['nama_mahasiswa']; ?></td>
                                    <td><?php echo $row['jurusan']; ?></td>
                                    <td><?php echo $row['nama_pembimbing']; ?></td>
                                    <td><?php echo ucfirst($row['role']); ?></td>
                                    <td><?php echo $row['assignment_date']; ?></td>
                                </tr>
                            <?php endwhile; ?>
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
