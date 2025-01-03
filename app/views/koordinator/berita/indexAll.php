<?php
function section($result) {
    if (!$result) { // Periksa apakah array kosong
        echo "<p>Belum ada berita ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jurusan</th>
                                <th>Tanggal Publikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['publish_date']); ?></td>
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
