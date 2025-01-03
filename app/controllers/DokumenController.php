<?php
include_once 'app/models/DokumenModel.php';

class DokumenController {
    private $model;

    public function __construct($db) {
        $this->model = new DokumenModel($db);
    }

    // Menampilkan dokumen berdasarkan jenis (proposal, laporan, revisi)
    public function listByType($mahasiswa_id, $type) {
        // Digunakan oleh Mahasiswa dan Dosen untuk melihat dokumen tertentu
        $dokumens = $this->model->getDokumenByType($mahasiswa_id, $type);
        include 'app/views/dokumen/list_type.php';
    }

    // Mengunggah dokumen baru
    public function upload() {
        // Digunakan oleh Mahasiswa untuk mengunggah dokumen tugas akhir
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'kegiatan_id' => $_POST['kegiatan_id'],
                'dokumen_type' => $_POST['dokumen_type'],
                'file_path' => $_POST['file_path'], // Path file yang diunggah
                'status' => 'menunggu',            // Status default dokumen
                'upload_date' => date('Y-m-d H:i:s')
            ];
            if ($this->model->createDokumen($data)) {
                header("Location: /dokumen");
                exit;
            }
        }
        include 'app/views/dokumen/upload.php';
    }
}
?>
