<?php
include 'app/templates/header.php';
?>
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Memuat konten dari halaman -->
        <?php
        // Menampilkan konten dari section
        $currentRole = $_SESSION['role'];

        if (function_exists('section')) {
            section($result, $currentRole);
        } else {
            echo "<p>Konten tidak ditemukan.</p>";
        }
        ?>
        
    </div>
</div>
<?php include 'app/templates/footer.php'; ?>