<?php
include_once 'app/models/UserModel.php';

class AuthController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new UserModel($db);
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        // View untuk form login
        include 'app/views/auth/login.php';
    }

    // Proses autentikasi login
    public function login()
    {
        // Fungsi ini digunakan oleh semua pengguna (Admin, Mahasiswa, Dosen, Koordinator)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Panggil metode authenticate di UserModel
            $user = $this->model->authenticate($username, $password);

            if ($user) {
                // Simpan informasi pengguna ke sesi
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['username'] = $user['username'];

                // Redirect ke dashboard berdasarkan role
                switch ($user['role']) {
                    case 'admin':
                        header('Location: /siptam/admin/dashboard');
                        break;
                    case 'mahasiswa':
                        header('Location: /siptam/mahasiswa/dashboard');
                        break;
                    case 'dosen':
                        header('Location: /siptam/dosen/dashboard');
                        break;
                    case 'koordinator':
                        header('Location: /siptam/koordinator/dashboard');
                        break;
                    default:
                        header('Location: /siptam/');
                        break;
                }
                exit;
            } else {
                // Jika login gagal, tampilkan pesan error
                $error = "Username atau password salah.";
                include 'app/views/auth/login.php';
            }
        }
    }

    // Proses logout
    public function logout()
    {
        // Fungsi ini digunakan oleh semua pengguna untuk keluar dari sistem
        session_start();
        session_destroy();
        header('Location: /siptam');
        exit;
    }
}
?>
