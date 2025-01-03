<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Notifikasi</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h5>Daftar Notifikasi</h5>
                        <?php if (!$notifikasi): ?>
                            <p>Tidak ada notifikasi.</p>
                        <?php else: ?>
                            <ul class="list-group">
                                <?php foreach ($notifikasi as $item): ?>
                                    <li class="list-group-item">
                                        <strong><?php echo $item['message']; ?></strong>
                                        <br>
                                        <small><?php echo $item['timestamp']; ?></small>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
