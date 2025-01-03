<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Edit Proposal</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>/proposal/edit/<?php echo $proposal['proposal_id']; ?>" class="forms-sample">
                        <div class="form-group">
                            <label for="title">Judul Proposal</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $proposal['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="abstract">Abstrak</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="5" required><?php echo $proposal['abstract']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Proposal</label>
                            <select class="form-control" id="status" name="status">
                                <option value="menunggu" <?php echo ($proposal['status'] === 'menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="disetujui" <?php echo ($proposal['status'] === 'disetujui') ? 'selected' : ''; ?>>Disetujui</option>
                                <option value="ditolak" <?php echo ($proposal['status'] === 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="<?php echo BASE_URL; ?>/proposal" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/templates/footer.php'; ?>
