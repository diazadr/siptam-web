<?php
include_once 'app/models/TugasAkhirModel.php';
include_once 'app/models/DosenModel.php';
include_once 'app/models/MahasiswaModel.php';

class TugasAkhirController {
    private $model;
    private $dosenModel;
    private $mahasiswaModel;

    public function __construct($db) {
        $this->model = new TugasAkhirModel($db);
        $this->dosenModel = new DosenModel($db);
        $this->mahasiswaModel = new MahasiswaModel($db);
    }

    // Display all Tugas Akhir
    public function index() {
        $result = $this->model->getAll();
        include 'app/views/TugasAkhir/index.php';
    }

    // Add a new Tugas Akhir
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->judul = $_POST['judul'];
            $this->model->deskripsi = $_POST['deskripsi'];
            $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
            $this->model->id_pembimbing = $_POST['id_pembimbing'];
            $this->model->id_penguji = $_POST['id_penguji'];
            $this->model->status = $_POST['status'];
            $this->model->tanggal_pengajuan = $_POST['tanggal_pengajuan'];
            $this->model->tanggal_selesai = $_POST['tanggal_selesai'];
            if ($this->model->create()) {
                header("Location: /siptam/TugasAkhir");
                exit;
            }
        }
        $dosen_list = $this->dosenModel->getAll();
        $mahasiswa_list = $this->mahasiswaModel->getAll();
        include 'app/views/TugasAkhir/tambah.php';
    }

    // Edit an existing Tugas Akhir
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->judul = $_POST['judul'];
            $this->model->deskripsi = $_POST['deskripsi'];
            $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
            $this->model->id_pembimbing = $_POST['id_pembimbing'];
            $this->model->id_penguji = $_POST['id_penguji'];
            $this->model->status = $_POST['status'];
            $this->model->tanggal_pengajuan = $_POST['tanggal_pengajuan'];
            $this->model->tanggal_selesai = $_POST['tanggal_selesai'];
            if ($this->model->update()) {
                header("Location: /siptam/TugasAkhir");
                exit;
            }
        }
        $mahasiswa_list = $this->mahasiswaModel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        $tugas_akhir = $this->model->getById($id);
       
        include 'app/views/TugasAkhir/edit.php';
    }

    // Delete a Tugas Akhir by ID
    public function delete($id) {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /siptam/TugasAkhir");
            exit;
        }
    }

    // Provide assessment for Tugas Akhir
    public function beriPenilaian($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nilai = $_POST['nilai'];
            $feedback = $_POST['feedback'];
            if ($this->model->beriPenilaian($id, $nilai, $feedback)) {
                header("Location: /TugasAkhir");
                exit;
            }
        }
        $tugasAkhir = $this->model->getById($id);
        include 'app/views/TugasAkhir/beriPenilaian.php';
    }

    // Update Tugas Akhir sidang status
    public function updateStatusSidang($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status_sidang = $_POST['status_sidang'];
            if ($this->model->updateStatusSidang($id, $status_sidang)) {
                header("Location: /TugasAkhir");
                exit;
            }
        }
        $tugasAkhir = $this->model->getById($id);
        include 'app/views/TugasAkhir/updateStatusSidang.php';
    }

    // View history of Tugas Akhir based on semester
    public function getRiwayatSidang($semester) {
        $riwayatSidang = $this->model->getRiwayatSidang($semester);
        include 'app/views/TugasAkhir/riwayatSidang.php';
    }

    // Verify attendance for Tugas Akhir
    public function verifikasiKehadiran($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kehadiran = $_POST['kehadiran'];
            if ($this->model->verifikasiKehadiran($id, $kehadiran)) {
                header("Location: /TugasAkhir");
                exit;
            }
        }
        $tugasAkhir = $this->model->getById($id);
        include 'app/views/TugasAkhir/verifikasiKehadiran.php';
    }
}
