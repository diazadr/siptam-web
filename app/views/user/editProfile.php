<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Profil</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>user/update/<?php echo $user['user_id']; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="username">Nama</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small>Kosongkan jika tidak ingin mengganti password.</small>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>user" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
