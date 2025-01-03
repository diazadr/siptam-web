<?php
include_once 'app/models/MahasiswaModel.php';

class MahasiswaController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new MahasiswaModel($db);
    }

    public function index()
    {
        // Digunakan oleh Admin atau Koordinator untuk melihat semua mahasiswa
        $result = $this->model->getAll();
        include 'app/views/mahasiswa/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'nim' => $_POST['nim'],
                'jurusan' => $_POST['jurusan'],
                'semester_active' => $_POST['semester_active']
            ];
            if ($this->model->createMahasiswa($data)) {
                header("Location: /siptam/mahasiswa");
                exit;
            }
        }
        // Ambil data pengguna dengan role "mahasiswa"
        $mahasiswaUsers = $this->model->getUsersByRole('mahasiswa');
        include 'app/views/mahasiswa/create.php';
    }
    public function searchUsers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['q'])) {
            $keyword = $_GET['q'];
            $users = $this->model->searchUsersByEmailOrName($keyword, 'mahasiswa');

            // Kembalikan hasil dalam format JSON
            header('Content-Type: application/json');
            echo json_encode($users);
            exit;
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'user_id' => $_POST['user_id'],
                'nim' => $_POST['nim'],
                'jurusan' => $_POST['jurusan'],
                'semester_active' => $_POST['semester_active']
            ];

            if ($this->model->updateMahasiswa($id, $data)) {
                header("Location: /siptam/mahasiswa");
                exit;
            }
        }

        $mahasiswa = $this->model->getMahasiswaById($id);

        if (!$mahasiswa) {
            header("Location: /siptam/mahasiswa?error=not_found");
            exit;
        }

        include 'app/views/mahasiswa/edit.php';
    }

    public function delete($id)
    {
        if ($this->model->deleteMahasiswa($id)) {
            header("Location: /siptam/mahasiswa");
            exit;
        }
    }
}
?>
