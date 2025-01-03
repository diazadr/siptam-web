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
                <h4 class="card-title">Daftar Berita</h4>
                <div class="mb-3">
                    <a href="<?php echo BASE_URL; ?>berita/create" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Berita
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Jurusan</th>
                                <th>Tanggal Publikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['publish_date']); ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>berita/edit/<?php echo $row['berita_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>berita/delete/<?php echo $row['berita_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
