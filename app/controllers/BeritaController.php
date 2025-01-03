<?php
include_once 'app/models/BeritaModel.php';

class BeritaController {
    private $model;

    public function __construct($db) {
        $this->model = new BeritaModel($db);
    }

    public function listAll() {
        // Digunakan oleh semua pengguna untuk melihat daftar berita
        $result = $this->model->getAllBerita();
        include 'app/views/koordinator/berita/index.php';
    }

    public function index() {
        // Digunakan oleh semua pengguna untuk melihat daftar berita
        $result = $this->model->getAllBerita();
        include 'app/views/koordinator/berita/indexAll.php';
    }

    public function create() {
        // Digunakan oleh Koordinator untuk membuat berita baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'jurusan' => $_POST['jurusan'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'publish_date' => date('Y-m-d H:i:s'),
                'created_by' => $_POST['created_by']
            ];
            if ($this->model->createBerita($data)) {
                header("Location: /siptam/berita");
                exit;
            }
        }
        include 'app/views/koordinator/berita/create.php';
    }
}
?>
