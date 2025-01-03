<?php
include_once 'app/models/UserModel.php';

class UserController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new UserModel($db);
    }

    // Menampilkan daftar semua pengguna
    public function index()
    {
        $role = $_GET['role'] ?? null; // Dapatkan role dari query string jika ada
        if ($role) {
            $result = $this->model->getByRole($role); // Panggil method untuk mendapatkan pengguna berdasarkan role
        } else {
            $result = $this->model->getAll(); // Tampilkan semua pengguna jika tidak ada filter
        }
    
        $currentRole = $_SESSION['role']; // Ambil role pengguna saat ini dari session
        include 'app/views/user/index.php'; // Tampilkan view
    }
    
    // Membuat pengguna baru
    public function create()
    {
        // Fungsi ini digunakan oleh Admin untuk menambahkan pengguna baru
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->username = $_POST['username'];
            $this->model->password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
            $this->model->email = $_POST['email'];
            $this->model->role = $_POST['role'];

            if ($this->model->create()) {
                header("Location: /siptam/user"); // Redirect ke halaman daftar pengguna
                exit;
            }
        }

        // Menampilkan form tambah pengguna
        include 'app/views/user/create.php';
    }

    // Mengedit data pengguna
    public function edit($id)
    {
        // Fungsi ini digunakan oleh Admin untuk memperbarui informasi pengguna
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->user_id = $id;
            $this->model->username = $_POST['username'];
            $this->model->password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
            $this->model->email = $_POST['email'];
            $this->model->role = $_POST['role'];

            if ($this->model->update()) {
                header("Location: /siptam/user"); // Redirect ke halaman daftar pengguna
                exit;
            }
        }

        // Mendapatkan data pengguna berdasarkan ID
        $user = $this->model->getById($id);

        // Menampilkan form edit pengguna
        include 'app/views/user/edit.php';
    }

    // Menghapus data pengguna
    public function delete($id)
    {
        // Fungsi ini digunakan oleh Admin untuk menghapus pengguna
        $this->model->user_id = $id;

        if ($this->model->delete()) {
            header("Location: /siptam/user"); // Redirect ke halaman daftar pengguna
            exit;
        }
    }
}
?>
