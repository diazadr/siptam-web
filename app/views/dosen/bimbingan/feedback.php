<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Feedback Bimbingan</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/bimbingan/feedback/<?php echo $bimbingan['session_id']; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="tanggal">Tanggal Bimbingan</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $bimbingan['tanggal']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan Bimbingan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" readonly><?php echo $bimbingan['catatan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="feedback">Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="5" required><?php echo $bimbingan['feedback']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan Feedback</button>
                        <a href="<?php echo BASE_URL; ?>/bimbingan" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
