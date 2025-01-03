<?php include 'app/templates/header.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Mahasiswa</h4>
                    <form method="POST" action="<?php echo BASE_URL; ?>mahasiswa/create" class="forms-sample">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" required>
                        </div>
                        <div class="form-group position-relative">
                            <label for="user_email">Email (User)</label>
                            <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Ketik untuk mencari email">
                            <input type="hidden" id="user_id" name="user_id">
                            <div id="user_email_suggestions" class="dropdown-menu"></div>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Jurusan" required>
                        </div>
                        <div class="form-group">
                            <label for="semester_active">Semester Aktif</label>
                            <input type="text" class="form-control" id="semester_active" name="semester_active" placeholder="Semester Aktif" required>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="<?php echo BASE_URL; ?>mahasiswa" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const userInput = document.getElementById('user_email');
    const suggestions = document.getElementById('user_email_suggestions');

    userInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length < 2) {
            suggestions.innerHTML = '';
            suggestions.classList.remove('show');
            return;
        }

        fetch(`/siptam/searchUsers?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                suggestions.innerHTML = '';
                if (data.length === 0) {
                    const noResult = document.createElement('div');
                    noResult.classList.add('dropdown-item', 'text-muted');
                    noResult.textContent = 'Tidak ada hasil';
                    suggestions.appendChild(noResult);
                } else {
                    data.forEach(user => {
                        const option = document.createElement('a');
                        option.classList.add('dropdown-item');
                        option.textContent = user.email;
                        option.dataset.userId = user.user_id;
                        option.style.cursor = 'pointer';
                        option.addEventListener('click', function() {
                            userInput.value = this.textContent;
                            document.getElementById('user_id').value = this.dataset.userId;
                            suggestions.innerHTML = '';
                            suggestions.classList.remove('show');
                        });
                        suggestions.appendChild(option);
                    });
                }
                suggestions.classList.add('show');
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    document.addEventListener('click', function(e) {
        if (!userInput.contains(e.target) && !suggestions.contains(e.target)) {
            suggestions.classList.remove('show');
        }
    });
</script>

<?php include 'app/templates/footer.php'; ?>
