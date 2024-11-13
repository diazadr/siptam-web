<?php
include_once 'app/models/DosenModel.php';
include_once 'app/models/JadwalModel.php'; // Model untuk penjadwalan sidang

class DosenController
{
    private $model;
    private $jadwalModel;

    public function __construct($db)
    {
        $this->model = new DosenModel($db);
        $this->jadwalModel = new JadwalModel($db);
    }

    // Menampilkan daftar dosen
    public function index()
    {
        $result = $this->model->getAll();
        include 'app/views/dosen/index.php';
    }

    // Menampilkan jadwal sidang untuk panel penguji
    public function lihatJadwalSidang()
    {
        $jadwalSidang = $this->jadwalModel->getAll();
        include 'app/views/dosen/jadwalSidang.php'; // Sesuaikan dengan lokasi file tampilan
    }

    // Memberikan penilaian dan feedback untuk sidang tugas akhir
    public function berikanPenilaian($id_mahasiswa)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $penilaian = $_POST['penilaian'];
            $feedback = $_POST['feedback'];

            // Fungsi untuk menyimpan penilaian dan feedback
            if ($this->model->simpanPenilaian($id_mahasiswa, $penilaian, $feedback)) {
                header("Location: /siptam/dosen/jadwalSidang"); // Sesuaikan path
                exit;
            }
        }
        $mahasiswa = $this->model->getMahasiswaById($id_mahasiswa);
        include 'app/views/dosen/berikanPenilaian.php'; // Sesuaikan dengan lokasi file tampilan
    }

    // Memantau progres sidang mahasiswa yang diujinya
    public function pantauProgresSidang($id_mahasiswa)
    {
        $progresSidang = $this->model->getProgresSidang($id_mahasiswa);
        include 'app/views/dosen/progresSidang.php'; // Sesuaikan dengan lokasi file tampilan
    }

    // Melihat riwayat mahasiswa yang telah disidang
    public function riwayatSidang()
    {
        $riwayatSidang = $this->model->getRiwayatSidang();
        include 'app/views/dosen/riwayatSidang.php'; // Sesuaikan dengan lokasi file tampilan
    }

    // Fungsi CRUD Dosen

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->nama = $_POST['nama'];
            $this->model->username = $_POST['username'];
            $this->model->password = $_POST['password'];
            $this->model->role = $_POST['role'];
            $this->model->email = $_POST['email'];
            $this->model->no_telepon = $_POST['no_telepon'];
            if ($this->model->create()) {
                header("Location: /siptam/dosen");
                exit;
            }
        }
        include 'app/views/dosen/tambah.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->nama = $_POST['nama'];
            $this->model->username = $_POST['username'];
            $this->model->password = $_POST['password'];
            $this->model->role = $_POST['role'];
            $this->model->email = $_POST['email'];
            $this->model->no_telepon = $_POST['no_telepon'];
            if ($this->model->update()) {
                header("Location: /siptam/dosen");
                exit;
            }
        }
        $dosen = $this->model->getById($id);
        include 'app/views/dosen/edit.php';
    }

    public function delete($id)
    {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /siptam/dosen");
            exit;
        }
    }
}
