<?php
class JadwalController {
    private $model;

    public function __construct($db) {
        $this->model = new JadwalModel($db);
    }

    public function create() {
        // Digunakan oleh Koordinator untuk membuat jadwal baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'kegiatan_id' => $_POST['kegiatan_id'],
                'type' => $_POST['type'],
                'tanggal' => $_POST['tanggal'],
                'waktu' => $_POST['waktu'],
                'lokasi' => $_POST['lokasi'],
                'status' => 'dijadwalkan'
            ];
            if ($this->model->createJadwal($data)) {
                header("Location: /jadwal");
                exit;
            }
        }
        include 'app/views/jadwal/create.php';
    }

    public function listUpcoming($user_id) {
        // Digunakan oleh Mahasiswa atau Dosen untuk melihat jadwal mendatang
        $jadwals = $this->model->getUpcomingJadwal($user_id);
        include 'app/views/jadwal/list.php';
    }

    
}
?>
