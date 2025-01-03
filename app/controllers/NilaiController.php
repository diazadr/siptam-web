<?php
class NilaiController {
    private $model;

    public function __construct($db) {
        $this->model = new NilaiModel($db);
    }

    public function create() {
        // Digunakan oleh Panel Penguji untuk memberikan nilai
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'jadwal_id' => $_POST['jadwal_id'],
                'penguji_id' => $_POST['penguji_id'],
                'score' => $_POST['score'],
                'comments' => $_POST['comments']
            ];
            if ($this->model->createNilai($data)) {
                header("Location: /nilai");
                exit;
            }
        }
        include 'app/views/nilai/create.php';
    }

    public function listByMahasiswa($mahasiswa_id) {
        // Digunakan oleh Mahasiswa atau Koordinator untuk melihat nilai
        $nilais = $this->model->getNilaiByMahasiswa($mahasiswa_id);
        include 'app/views/nilai/list.php';
    }
}
?>
