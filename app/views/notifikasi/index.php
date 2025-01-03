<?php
function section($result) {
    if (!$result) {
        echo "<p>Tidak ada notifikasi.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Notifikasi</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                    <td><?php echo $row['timestamp']; ?></td>
                                    <td>
                                        <?php if ($row['status'] === 'belum dibaca'): ?>
                                            <a href="<?php echo BASE_URL; ?>/notifikasi/mark-as-read/<?php echo $row['notifikasi_id']; ?>" class="btn btn-success btn-sm">Tandai Dibaca</a>
                                        <?php endif; ?>
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
