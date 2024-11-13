<?php include 'app/templates/header.php'; ?>

<h3 class="text-center my-4">Daftar Tamu</h3>

<div class="mb-3">
    <a href="<?php echo BASE_URL; ?>tamu/tambah" class="btn btn-primary">Tambah Tamu</a>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-success">Kembali</a>
</div>

<table class="table table-hover text-center">
    <thead>
        <tr>
        <th>ID</th>
            <th>Nama Tamu</th>
            <th>Kontak</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo $row['id_tamu']; ?></td>
                <td><?php echo $row['nama_tamu']; ?></td>
                <td><?php echo $row['kontak_tamu']; ?></td>
                <td><?php echo $row['alamat_tamu']; ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>tamu/edit/<?php echo $row['id_tamu']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo BASE_URL; ?>tamu/hapus/<?php echo $row['id_tamu']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include 'app/templates/footer.php'; ?>
