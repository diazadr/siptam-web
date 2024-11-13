<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Penguji</h4>
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Bidang Keahlian</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['bidang_keahlian']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['no_telepon']; ?></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>penguji/beri_penilaian/edit/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?php echo BASE_URL; ?>penguji/beri_penilaian/hapus/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?php echo BASE_URL; ?>penguji/beri_penilaian/create" class="btn btn-primary">Tambah Penguji</a>
        </div>
    </div>
</div>