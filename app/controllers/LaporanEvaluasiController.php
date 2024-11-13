<?php
include_once 'app/models/LaporanEvaluasiModel.php';
include_once 'app/models/TugasAkhirModel.php';
include_once 'app/models/DosenModel.php';
include_once 'app/models/MahasiswaModel.php';

class LaporanEvaluasiController {
    private $model;
    private $TAmodel;
    private $dosenModel;
    private $mahasiswaModel;

    public function __construct($db) {
        $this->model = new LaporanEvaluasiModel($db);
        $this->TAmodel = new TugasAkhirModel($db);
        $this->dosenModel = new DosenModel($db);
        $this->mahasiswaModel = new MahasiswaModel($db);
    }

    // Display all Tugas Akhir
    public function index() {
        $result = $this->model->getAll();
        include 'app/views/LaporanEvaluasi/index.php';
    }

    // Add a new Tugas Akhir
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
            $this->model->id_dosen = $_POST['id_dosen'];
            $this->model->jenis = $_POST['jenis'];
            $this->model->nilai = $_POST['nilai'];
            $this->model->komentar = $_POST['komentar'];
            $this->model->tanggal = $_POST['tanggal'];
            if ($this->model->create()) {
                header("Location: /siptam/LaporanEvaluasi");
                exit;
            }
        }
        $TAlist = $this->TAmodel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        $mahasiswa_list = $this->mahasiswaModel->getAll();
        include 'app/views/LaporanEvaluasi/tambah.php';
    }

    // Edit an existing Tugas Akhir
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
            $this->model->id_dosen = $_POST['id_dosen'];
            $this->model->jenis = $_POST['jenis'];
            $this->model->nilai = $_POST['nilai'];
            $this->model->komentar = $_POST['komentar'];
            $this->model->tanggal = $_POST['tanggal'];
            
            if ($this->model->update()) {
                header("Location: /siptam/LaporanEvaluasi");
                exit;
            }
        }
        $mahasiswa_list = $this->mahasiswaModel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        $TAlist = $this->TAmodel->getAll();
        $laporan_evaluasi = $this->model->getById($id);
       
        include 'app/views/LaporanEvaluasi/edit.php';
    }

    // Delete a Tugas Akhir by ID
    public function delete($id) {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /siptam/LaporanEvaluasi");
            exit;
        }
    }

}
