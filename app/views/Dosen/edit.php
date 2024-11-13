<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Data Dosen</h4>
                    <p class="card-description text-center">Form untuk mengedit data Dosen</p>
                    <form method="POST" action="" class="forms-sample">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $dosen['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $dosen['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dosen['password']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control" required>
                                <option disabled>Role</option>
                                <option value="pembimbing" <?php echo ($dosen['role'] == 'pembimbing') ? 'selected' : ''; ?>>Pembimbing</option>
                                <option value="penguji" <?php echo ($dosen['role'] == 'penguji') ? 'selected' : ''; ?>>Penguji</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $dosen['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon" value="<?php echo $dosen['no_telepon']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="index.php" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
