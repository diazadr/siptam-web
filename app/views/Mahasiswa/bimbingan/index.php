<?php
function section($result) {
    if (!$result) {
        echo "<p>Belum ada sesi bimbingan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Sesi Bimbingan</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Catatan</th>
                                <th>Feedback</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td><?php echo $row['catatan']; ?></td>
                                    <td><?php echo $row['feedback']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
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
