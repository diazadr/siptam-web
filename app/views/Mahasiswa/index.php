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
                <h4 class="card-title">Daftar Mahasiswa</h4>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td>
                                        <div class="password-container">
                                            <input type="password" value="<?php echo $row['password']; ?>" class="password-input" readonly>
                                            <button onclick="togglePassword(this)" class="btn btn-sm btn-icon-eye">
                                                <i class="ti-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['no_telepon']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL; ?>mahasiswa/edit/<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                                        <a href="<?php echo BASE_URL; ?>mahasiswa/hapus/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(button) {
            const passwordInput = button.previousElementSibling; // Ambil elemen input password
            if (passwordInput.type === "password") {
                passwordInput.type = "text"; // Menampilkan password
                button.innerHTML = '<i class="ti-eye-off"></i>'; // Ganti ikon menjadi mata tertutup
            } else {
                passwordInput.type = "password"; // Menyembunyikan password
                button.innerHTML = '<i class="ti-eye"></i>'; // Ganti ikon menjadi mata terbuka
            }
        }
    </script>

    <style>
        .password-container {
            display: flex;
            align-items: center;
        }

        .password-input {
            border: none;
            background: none;
            text-align: center;
            width: 100px;
        }

        .btn-icon-eye {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-left: 5px;
        }

        .btn-icon-eye i {
            font-size: 1.2em;
        }
    </style>
<?php
}

include 'app/templates/master.php';
?>