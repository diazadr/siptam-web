<?php
function section($result)
{
    if (!$result) {
        echo "<p>Data tidak ditemukan.</p>";
        return;
    }
?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Tugas Akhir</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Tugas Akhir</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Tempat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['id_tugas_akhir']; ?></td>
                                    <td><?php echo $row['jenis']; ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>      
                                    <td><?php echo $row['waktu']; ?></td>
                                    <td><?php echo $row['tempat']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>jadwal/edit/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo BASE_URL; ?>jadwal/hapus/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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