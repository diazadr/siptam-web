<?php
include 'app/templates/header.php';
?>

<div class="main-panel">
    <div class="content-wrapper">
        <!-- Memuat konten dari halaman -->
        <?php
        // Menampilkan konten dari section
        if (function_exists('section')) {
            section($result);
        } else {
            echo "<p>Konten tidak ditemukan.</p>";
        }
        ?>
    </div>
</div>
<?php include 'app/templates/footer.php'; ?>