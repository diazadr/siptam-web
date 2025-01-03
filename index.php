<?php
include_once 'config/Database.php';
include_once 'app/controllers/AuthController.php';
include_once 'app/controllers/BeritaController.php';
include_once 'app/controllers/MahasiswaController.php';
include_once 'app/controllers/KoordinatorController.php';
include_once 'app/controllers/UserController.php';
include_once 'app/controllers/BimbinganController.php';
include_once 'app/controllers/DokumenController.php';
include_once 'app/controllers/ProposalController.php';
include_once 'app/controllers/KegiatanController.php';
include_once 'app/controllers/RegistrasiController.php';
include_once 'app/controllers/NotifikasiController.php';
include_once 'app/controllers/JadwalController.php';
include_once 'app/controllers/PembimbingController.php';
include_once 'app/controllers/NilaiController.php';
include_once 'app/middleware/AuthMiddleware.php';
include_once 'app/controllers/AdminController.php';

$database = new Database();
$db = $database->getConnection();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Authentikasi
if ($url === '/siptam' || $url === '/siptam/') {
    $controller = new AuthController($db);
    $controller->showLoginForm();
} elseif ($url === '/siptam/auth/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AuthController($db);
    $controller->login();
} elseif ($url === '/siptam/auth/logout') {
    $controller = new AuthController($db);
    $controller->logout();
} else {

    AuthMiddleware::checkLogin();

    // User Management
    //untuk admin dan koordinator
    if ($url === '/siptam/user') {
        AuthMiddleware::checkRole(['admin', 'koordinator']);
        $controller = new UserController($db);
        $controller->index();
        //untuk admin
    } elseif ($url === '/siptam/user/create') {
        AuthMiddleware::checkRole(['admin']);
        $controller = new UserController($db);
        $controller->create();
        //untuk admin
    } elseif (preg_match('/\/siptam\/user\/edit\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['admin']);
        $controller = new UserController($db);
        $controller->edit($matches[1]);
        //untukadmin
    } elseif (preg_match('/\/siptam\/user\/delete\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['admin']);
        $controller = new UserController($db);
        $controller->delete($matches[1]);

        // Admin
        //untuk admin
    } elseif ($url === '/siptam/admin/dashboard') {
        AuthMiddleware::checkRole(['admin']);
        $controller = new AdminController($db);
        $controller->index();


        // Berita
        //untuk seluruhnya
    } elseif ($url === '/siptam/koordinator/berita') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new BeritaController($db);
        $controller->listAll();
        //untuk koordinator
    } elseif ($url === '/siptam/berita') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new BeritaController($db);
        $controller->index();
        //untuk koordinator
    } elseif ($url === '/siptam/berita/create') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new BeritaController($db);
        $controller->create();


        // Mahasiswa
        //untuk admin
    } elseif ($url === '/siptam/mahasiswa') {
        AuthMiddleware::checkRole(['admin', 'koordinator']);
        $controller = new MahasiswaController($db);
        $controller->index();
        //untuk admin
    } elseif ($url === '/siptam/mahasiswa/create') {
        AuthMiddleware::checkRole(['admin']);
        $controller = new MahasiswaController($db);
        $controller->create();
        //untuk admin
    } elseif (preg_match('/\/siptam\/mahasiswa\/edit\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['admin']);
        $controller = new MahasiswaController($db);
        $controller->edit($matches[1]);
        //untuk admin
    } elseif (preg_match('/\/siptam\/mahasiswa\/delete\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['admin']);
        $controller = new MahasiswaController($db);
        $controller->delete($matches[1]);
        //untuk admin
    } elseif ($url === '/siptam/searchUsers') {
        AuthMiddleware::checkRole(['admin', 'koordinator']);
        $mahasiswaController = new MahasiswaController($db);
        $mahasiswaController->searchUsers();




        // Pembimbing
    } elseif ($url === '/siptam/pembimbing') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new PembimbingController($db);
        $controller->listByMahasiswa($_SESSION['user_id']);
    } elseif ($url === '/siptam/pembimbing/create') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new PembimbingController($db);
        $controller->assign();

        // Koordinator
    } elseif ($url === '/siptam/koordinator/dashboard') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new KoordinatorController($db);
        $controller->index();
    } elseif ($url === '/siptam/bimbingan') {
        $controller = new BimbinganController($db);
        $controller->listByMahasiswa($_SESSION['user_id']);

        // REGISTRASI
    } elseif ($url === '/siptam/registrasi') {
        AuthMiddleware::checkRole(['akademik']);
        $controller = new RegistrasiController($db);
        $controller->index();
    } elseif ($url === '/siptam/registrasi/create') {
        AuthMiddleware::checkRole(['mahasiswa']);
        $controller = new RegistrasiController($db);
        $controller->create();
    } elseif (preg_match('/\/siptam\/registrasi\/approve\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['akademik']);
        $controller = new RegistrasiController($db);
        $controller->approve($matches[1]);
    } elseif (preg_match('/\/siptam\/registrasi\/reject\/(\d+)/', $url, $matches)) {
        AuthMiddleware::checkRole(['akademik']);
        $controller = new RegistrasiController($db);
        $controller->reject($matches[1]);
    } elseif (preg_match('/\/siptam\/registrasi\/detail\/(\d+)/', $url, $matches)) {
        $controller = new RegistrasiController($db);
        $controller->detail($matches[1]);

        // JADWAL
    } elseif ($url === '/siptam/jadwal') {
        AuthMiddleware::checkRole(['mahasiswa', 'dosen']);
        $controller = new JadwalController($db);
        $controller->listUpcoming($_SESSION['user_id']);
    } elseif ($url === '/siptam/jadwal/create') {
        AuthMiddleware::checkRole(['koordinator']);
        $controller = new JadwalController($db);
        $controller->create();











        // KEGIATAN
    } elseif ($url === '/siptam/kegiatan') {
        $controller = new KegiatanController($db);
        $controller->index();
    } elseif ($url === '/siptam/kegiatan/create') {
        $controller = new KegiatanController($db);
        $controller->create();
    } elseif (preg_match('/\/siptam\/kegiatan\/edit\/(\d+)/', $url, $matches)) {
        $controller = new KegiatanController($db);
        $controller->edit($matches[1]);
    } elseif (preg_match('/\/siptam\/kegiatan\/delete\/(\d+)/', $url, $matches)) {
        $controller = new KegiatanController($db);
        $controller->delete($matches[1]);


        // **BIMBINGAN** (Mahasiswa & Dosen Feedback)
    } elseif ($url === '/siptam/bimbingan') {
        $controller = new BimbinganController($db);
        $controller->listByMahasiswa($_SESSION['user_id']);
    } elseif ($url === '/siptam/bimbingan/create') {
        $controller = new BimbinganController($db);
        $controller->create();
    } elseif (preg_match('/\/siptam\/bimbingan\/feedback\/(\d+)/', $url, $matches)) {
        $controller = new BimbinganController($db);
        $controller->feedback($matches[1]);

        // DOKUMEN
    } elseif ($url === '/siptam/dokumen') {
        $controller = new DokumenController($db);
        $controller->listByType($_SESSION['user_id'], $_GET['type'] ?? 'proposal');
    } elseif ($url === '/siptam/dokumen/upload') {
        $controller = new DokumenController($db);
        $controller->upload();

        // PROPOSAL
    } elseif ($url === '/siptam/proposal/submit') {
        $controller = new ProposalController($db);
        $controller->submit();
    } elseif (preg_match('/\/siptam\/proposal\/approve\/(\d+)/', $url, $matches)) {
        $controller = new ProposalController($db);
        $controller->approve($matches[1]);
    } elseif (preg_match('/\/siptam\/proposal\/reject\/(\d+)/', $url, $matches)) {
        $controller = new ProposalController($db);
        $controller->reject($matches[1]);
    } elseif (preg_match('/\/siptam\/proposal\/detail\/(\d+)/', $url, $matches)) {
        $controller = new ProposalController($db);
        $controller->detail($matches[1]);

        // **NOTIFIKASI** (Semua Pengguna)
    } elseif ($url === '/siptam/notifikasi') {
        $controller = new NotifikasiController($db);
        $controller->listByUser($_SESSION['user_id']);



        // **NILAI** (Panel Penguji & Mahasiswa View)
    } elseif ($url === '/siptam/nilai') {
        $controller = new NilaiController($db);
        $controller->listByMahasiswa($_SESSION['user_id']);
    } elseif ($url === '/siptam/nilai/create') {
        $controller = new NilaiController($db);
        $controller->create();

        // Jika URL tidak ditemukan
    } else {
        include '404.php';
    }
}
