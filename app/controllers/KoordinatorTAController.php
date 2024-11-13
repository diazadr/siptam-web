<?php
include_once 'app/models/KoordinatorTAModel.php';

class KoordinatorTAController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new KoordinatorTAModel($db);
    }

    // Menampilkan semua koordinator tugas akhir
    public function index()
    {
        $result = $this->model->getAll();
        include 'app/views/koordinator/index.php';
    }

    // Menambahkan koordinator tugas akhir
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->nama = $_POST['nama'];
            $this->model->username = $_POST['username'];
            $this->model->password = $_POST['password']; // Jangan lupa untuk hashing password jika perlu
            $this->model->email = $_POST['email'];
            $this->model->no_telepon = $_POST['no_telepon'];

            if ($this->model->create()) {
                header("Location: /siptam/koordinator");
                exit;
            }
        }
        include 'app/views/koordinator/tambah.php';
    }

    // Mengedit koordinator tugas akhir
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->nama = $_POST['nama'];
            $this->model->username = $_POST['username'];
            $this->model->password = $_POST['password']; // Jangan lupa untuk hashing password jika perlu
            $this->model->email = $_POST['email'];
            $this->model->no_telepon = $_POST['no_telepon'];

            if ($this->model->update()) {
                header("Location: /siptam/koordinator");
                exit;
            }
        }
        $koordinator = $this->model->getById($id);
        include 'app/views/koordinator/edit.php';
    }

    // Menghapus koordinator tugas akhir
    public function delete($id)
    {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /siptam/koordinator");
            exit;
        }
    }
}
