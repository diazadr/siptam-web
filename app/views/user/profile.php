<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Profil Pengguna</h4>
                <p class="text-center">Informasi pribadi Anda.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Informasi Akun</h5>
                        <p><strong>Nama:</strong> <?php echo $user['username']; ?></p>
                        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                        <p><strong>Peran:</strong> <?php echo ucfirst($user['role']); ?></p>
                        <a href="<?php echo BASE_URL; ?>/user/edit/<?php echo $user['user_id']; ?>" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
