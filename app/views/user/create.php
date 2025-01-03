<?php include 'app/templates/header.php'; ?>
<div class="main-panel">
    <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Pengguna Baru</h4>
                <form action="<?php echo BASE_URL; ?>user/create" method="POST" class="forms-sample">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required placeholder="Masukkan username">
                    </div>
                    <div class="form-group position-relative">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled selected>Pilih role pengguna</option>
                            <option value="admin">Admin</option>
                            <option value="koordinator">Koordinator</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>user" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php include 'app/templates/footer.php'; ?>
