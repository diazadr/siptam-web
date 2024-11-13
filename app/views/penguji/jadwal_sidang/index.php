<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Jadwal Sidang</h4>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Penguji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['waktu']; ?></td>
                                <td><?php echo $row['tempat']; ?></td>
                                <td><?php echo $row['penguji_id']; ?></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>penguji/jadwal_sidang/edit/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?php echo BASE_URL; ?>penguji/jadwal_sidang/hapus/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo BASE_URL; ?>penguji/jadwal_sidang/create" class="btn btn-primary">Tambah Jadwal Sidang</a>
        </div>
    </div>
</div>