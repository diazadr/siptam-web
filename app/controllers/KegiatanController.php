<?php
include_once 'app/models/KegiatanModel.php';

class KegiatanController {
    private $model;

    public function __construct($db) {
        $this->model = new KegiatanModel($db);
    }

    // Menampilkan semua kegiatan
    public function index() {
        // Digunakan oleh Koordinator dan Mahasiswa untuk melihat semua kegiatan
        $result = $this->model->getAllKegiatan();
        include 'app/views/koordinator/kegiatan/index.php';
    }

    // Menampilkan detail kegiatan berdasarkan ID
    public function detail($id) {
        // Digunakan oleh Koordinator dan Mahasiswa untuk melihat detail kegiatan
        $kegiatan = $this->model->getKegiatanById($id);
        include 'app/views/koordinator/kegiatan/detail.php';
    }

    // Membuat kegiatan baru
    public function create() {
        // Digunakan oleh Koordinator untuk menambahkan kegiatan baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'jurusan' => $_POST['jurusan'],
                'nama_kegiatan' => $_POST['nama_kegiatan'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'status' => $_POST['status'],
                'created_by' => $_POST['created_by']
            ];
            if ($this->model->createKegiatan($data)) {
                header("Location: /siptam/kegiatan");
                exit;
            }
        }
        include 'app/views/koordinator/kegiatan/create.php';
    }

    // Memperbarui data kegiatan
    public function edit($id) {
        // Digunakan oleh Koordinator untuk memperbarui kegiatan
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'jurusan' => $_POST['jurusan'],
                'nama_kegiatan' => $_POST['nama_kegiatan'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'status' => $_POST['status']
            ];
            if ($this->model->updateKegiatan($id, $data)) {
                header("Location: /siptam/kegiatan");
                exit;
            }
        }
        $kegiatan = $this->model->getKegiatanById($id);
        include 'app/views/koordinator/kegiatan/edit.php';
    }

    // Menghapus kegiatan
    public function delete($id) {
        // Digunakan oleh Koordinator untuk menghapus kegiatan
        if ($this->model->deleteKegiatan($id)) {
            header("Location: /siptam/kegiatan");
            exit;
        }
    }
}
?>
