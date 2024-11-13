<?php
include_once 'app/models/DokumenModel.php';

class DokumenController {
    private $model;

    public function __construct($db) {
        $this->model = new DokumenModel($db);
    }

    // Display all documents
    public function index() {
        $result = $this->model->getAll();
        include 'app/views/dokumen/index.php';
    }

    // Add a new document
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->nama_dokumen = $_POST['nama_dokumen'];
            $this->model->path = $_POST['path'];
            if ($this->model->create()) {
                header("Location: /dokumen");
                exit;
            }
        }
        include 'app/views/dokumen/create.php';
    }

    // Edit an existing document
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->nama_dokumen = $_POST['nama_dokumen'];
            $this->model->path = $_POST['path'];
            if ($this->model->update()) {
                header("Location: /dokumen");
                exit;
            }
        }
        $dokumen = $this->model->getById($id);
        include 'app/views/dokumen/edit.php';
    }

    // Delete a document by ID
    public function delete($id) {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /dokumen");
            exit;
        }
    }

    // View a specific document by ID
    public function view($id) {
        $dokumen = $this->model->getById($id);
        include 'app/views/dokumen/view.php';
    }
}
