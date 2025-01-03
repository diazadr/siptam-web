<?php

include_once 'app/models/RegistrasiModel.php';

class RegistrasiController {
    private $model;
    private $mahasiswaModel;

    public function __construct($db) {
        $this->model = new RegistrasiModel($db);
        $this->mahasiswaModel = new MahasiswaModel($db);
    }

    public function index() {
        // Mendapatkan semua data registrasi dengan informasi mahasiswa (username dan jurusan)
        $result = $this->model->getAllRegistrasi();

        // Mengirim data ke view
        include 'app/views/akademik/registrasi/index.php';
    }

    public function create() {
        // Digunakan oleh Mahasiswa untuk mendaftar ulang
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'kegiatan_id' => $_POST['kegiatan_id'],
                'payment_proof' => $_POST['payment_proof'],
                'status' => 'menunggu', // Status default saat registrasi baru
                'registrasi_date' => date('Y-m-d H:i:s')
            ];
            if ($this->model->createRegistrasi($data)) {
                header("Location: /registrasi");
                exit;
            }
        }
        include 'app/views/registrasi/create.php';
    }

    public function approve($id) {
        // Digunakan oleh Bagian Akademik untuk menyetujui registrasi
        if ($this->model->updateRegistrasiStatus($id, 'disetujui')) {
            header("Location: /registrasi");
            exit;
        }
    }

    public function reject($id) {
        // Digunakan oleh Bagian Akademik untuk menolak registrasi
        if ($this->model->updateRegistrasiStatus($id, 'ditolak')) {
            header("Location: /registrasi");
            exit;
        }
    }

    public function detail($id) {
        // Digunakan oleh Bagian Akademik untuk melihat detail registrasi
        $registrasi = $this->model->getRegistrasiDetail($id);
        include 'app/views/akademik/registrasi/detail.php';
    }
}
?>
