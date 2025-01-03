<?php
include_once 'app/models/PembimbingModel.php';
include_once 'app/models/MahasiswaModel.php';
include_once 'app/models/KegiatanModel.php';
include_once 'app/models/UserModel.php';

class PembimbingController {
    private $model;
    private $db; 

    public function __construct($db) {
        $this->model = new PembimbingModel($db);
        $this->db = $db;
    }

    public function assign() {
        // Inisialisasi model lainnya
        $mahasiswaModel = new MahasiswaModel($this->db);
        $kegiatanModel = new KegiatanModel($this->db);
        $userModel = new UserModel($this->db);

        // Mendapatkan data mahasiswa, kegiatan, dan dosen
        $mahasiswa = $mahasiswaModel->getAll();
        $kegiatan = $kegiatanModel->getAllKegiatan();
        $dosen = $userModel->getByRole('dosen');

        // Jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validasi input
            $mahasiswa_id = isset($_POST['mahasiswa_id']) ? (int)$_POST['mahasiswa_id'] : null;
            $kegiatan_id = isset($_POST['kegiatan_id']) ? (int)$_POST['kegiatan_id'] : null;
            $dosen_id = isset($_POST['dosen_id']) ? (int)$_POST['dosen_id'] : null;
            $is_reviewer = isset($_POST['is_reviewer']) ? 1 : 0;

            if ($mahasiswa_id && $kegiatan_id && $dosen_id) {
                // Data yang akan disimpan
                $data = [
                    'mahasiswa_id' => $mahasiswa_id,
                    'kegiatan_id' => $kegiatan_id,
                    'dosen_id' => $dosen_id,
                    'role' => $_POST['role'] ?? 'pembimbing',
                    'is_reviewer' => $is_reviewer,
                    'assignment_date' => date('Y-m-d H:i:s')
                ];

                // Simpan data
                if ($this->model->assignPembimbing($data)) {
                    // Redirect dengan pesan sukses
                    header("Location: /siptam/pembimbing/create");
                    exit;
                } else {
                    $error = "Gagal menetapkan pembimbing.";
                }
            } else {
                $error = "Data tidak valid. Mohon lengkapi semua isian.";
            }
        }

        // Kirim data ke view
        include 'app/views/koordinator/pembimbing/create.php';
    }

    public function listByMahasiswa($mahasiswa_id) {
        // Validasi input ID
        $mahasiswa_id = (int)$mahasiswa_id;
        if ($mahasiswa_id > 0) {
            $pembimbings = $this->model->getPembimbingByMahasiswa($mahasiswa_id);
            include 'app/views/pembimbing/list.php';
        } else {
            die("ID Mahasiswa tidak valid.");
        }
    }

    public function listByDosen($dosen_id) {
        // Validasi input ID
        $dosen_id = (int)$dosen_id;
        if ($dosen_id > 0) {
            $mahasiswas = $this->model->getMahasiswaByPembimbing($dosen_id);
            include 'app/views/pembimbing/list_mahasiswa.php';
        } else {
            die("ID Dosen tidak valid.");
        }
    }
}
