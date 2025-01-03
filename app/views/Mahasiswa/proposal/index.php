<?php
function section($result) {
    if (!$result) {
        echo "<p>Tidak ada proposal ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Proposal</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Proposal</th>
                                <th>Mahasiswa</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['nama_mahasiswa']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                    <td><?php echo $row['submission_date']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>/proposal/edit/<?php echo $row['proposal_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>/proposal/delete/<?php echo $row['proposal_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
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
