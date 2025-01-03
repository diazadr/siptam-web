<?php
function section($result) {
    if (!$result) {
        echo "<p>Belum ada data penguji ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Panel Penguji</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jadwal</th>
                                <th>Nama Penguji</th>
                                <th>Peran</th>
                                <th>Pembimbing Utama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['jadwal']; ?></td>
                                    <td><?php echo $row['nama_penguji']; ?></td>
                                    <td><?php echo ucfirst($row['role']); ?></td>
                                    <td><?php echo $row['is_primary_pembimbing'] ? 'Ya' : 'Tidak'; ?></td>
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
