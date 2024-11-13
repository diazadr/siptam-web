<?php
include_once 'app/models/LogBimbinganModel.php';
include_once 'app/models/DosenModel.php';
include_once 'app/models/TugasAkhirModel.php';

class LogBimbinganController {
    private $model;
    private $TAmodel;
    private $dosenModel;

    public function __construct($db) {
        $this->model = new LogBimbinganModel($db);
        $this->TAmodel = new TugasAkhirModel($db);
        $this->dosenModel = new DosenModel($db);
    }

    // Display all log entries
    public function index() {
        $result = $this->model->getAll();
        include 'app/views/LogBimbingan/index.php';
    }

    // Add a new log entry
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->tanggal = $_POST['tanggal'];
            $this->model->catatan = $_POST['catatan'];
            if ($this->model->create()) {
                header("Location: /siptam/logbimbingan");
                exit;
            }
        }
        $TAlist = $this->TAmodel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        include 'app/views/LogBimbingan/tambah.php';
    }

    // Edit an existing log entry
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->tanggal = $_POST['tanggal'];
            $this->model->catatan = $_POST['catatan'];
            if ($this->model->update()) {
                header("Location: /siptam/logbimbingan");
                exit;
            }
        }
        $TAlist = $this->TAmodel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        $logBimbingan = $this->model->getById($id);
        include 'app/views/LogBimbingan/edit.php';
    }

    // Delete a log entry by ID
    public function delete($id) {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /siptam/logbimbingan");
            exit;
        }
    }

    // View a specific log entry by ID
    public function view($id) {
        $logBimbingan = $this->model->getById($id);
        include 'app/views/LogBimbingan/view.php';
    }
}
