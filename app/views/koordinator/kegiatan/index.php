<?php
function section($result) {
    if (!$result) {
        echo "<p>Tidak ada kegiatan ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Kegiatan</h4>
                <div class="mb-3">
                    <a href="<?php echo BASE_URL; ?>kegiatan/create" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Kegiatan
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jurusan</th>
                                <th>Nama Kegiatan</th>
                                <th>Status</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($result as $row): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['jurusan']; ?></td>
                                    <td><?php echo $row['nama_kegiatan']; ?></td>
                                    <td><?php echo ucfirst($row['status']); ?></td>
                                    <td><?php echo $row['start_date']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>kegiatan/edit/<?php echo $row['kegiatan_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>kegiatan/delete/<?php echo $row['kegiatan_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
