<?php
include_once 'app/models/BimbinganModel.php';
class BimbinganController {
    private $model;

    public function __construct($db) {
        $this->model = new BimbinganModel($db);
    }

    public function create() {
        // Digunakan oleh Mahasiswa untuk menambahkan sesi bimbingan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'pembimbing_id' => $_POST['pembimbing_id'],
                'kegiatan_id' => $_POST['kegiatan_id'],
                'tanggal' => $_POST['tanggal'],
                'catatan' => $_POST['catatan'],
                'status' => 'menunggu'
            ];
            if ($this->model->createSesi($data)) {
                header("Location: /bimbingan");
                exit;
            }
        }
        include 'app/views/bimbingan/create.php';
    }

    public function feedback($id) {
        // Digunakan oleh Dosen untuk memberikan feedback pada sesi bimbingan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $feedback = $_POST['feedback'];
            if ($this->model->updateFeedback($id, $feedback)) {
                header("Location: /bimbingan");
                exit;
            }
        }
        $sesi = $this->model->getById($id);
        include 'app/views/bimbingan/feedback.php';
    }

    public function listByMahasiswa($mahasiswa_id) {
        // Digunakan oleh Mahasiswa untuk melihat sesi bimbingan mereka
        $sesi_bimbingans = $this->model->getByMahasiswa($mahasiswa_id);
        include 'app/views/bimbingan/list.php';
    }
}
?>
