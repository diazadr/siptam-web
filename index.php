<?php

include_once 'config/Database.php';
include_once 'app/controllers/HomeController.php';
include_once 'app/controllers/LoginController.php';
include_once 'app/controllers/BAAKController.php';
include_once 'app/controllers/MahasiswaController.php';
include_once 'app/controllers/DosenController.php';
include_once 'app/controllers/KoordinatorTAController.php';
include_once 'app/controllers/TugasAkhirController.php';
include_once 'app/controllers/JadwalController.php';
include_once 'app/controllers/LogBimbinganController.php';
include_once 'app/controllers/LaporanEvaluasiController.php';
include_once 'app/controllers/SeminarController.php';


$database = new Database();
$db = $database->getConnection();

// Ambil URL path
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Home
if ($url === '/siptam' || $url === '/siptam/') {
    $controller = new HomeController();
    $controller->index();
}

//LOGIN
elseif ($url === '/siptam/login') {
    $controller = new LoginController($db);
    $controller->index();
}
//CRUD BAAK
elseif ($url === '/siptam/baak') {
    $controller = new BAAKController($db);
    $controller->index();
} elseif ($url === '/siptam/baak/tambah') {
    $controller = new BAAKController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/baak\/edit\/(\d+)/', $url, $matches)) {
    $controller = new BaakController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/baak\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new BAAKController($db);
    $controller->delete($matches[1]);
}
//CRUD Mahasiswa
elseif ($url === '/siptam/mahasiswa') {
    $controller = new MahasiswaController($db);
    $controller->index();
} elseif ($url === '/siptam/mahasiswa/tambah') {
    $controller = new MahasiswaController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/mahasiswa\/edit\/(\d+)/', $url, $matches)) {
    $controller = new MahasiswaController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/mahasiswa\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new MahasiswaController($db);
    $controller->delete($matches[1]);
}
//CRUD Dosen

elseif ($url === '/siptam/dosen') {
    $controller = new DosenController($db);
    $controller->index();
} elseif ($url === '/siptam/dosen/tambah') {
    $controller = new DosenController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/dosen\/edit\/(\d+)/', $url, $matches)) {
    $controller = new DosenController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/dosen\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new DosenController($db);
    $controller->delete($matches[1]);
}



// CRUD Koordinator Tugas Akhir
elseif ($url === '/siptam/koordinator') {
    $controller = new KoordinatorTAController($db);
    $controller->index();
} elseif ($url === '/siptam/koordinator/tambah') {
    $controller = new KoordinatorTAController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/koordinator\/edit\/(\d+)/', $url, $matches)) {
    $controller = new KoordinatorTAController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/koordinator\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new KoordinatorTAController($db);
    $controller->delete($matches[1]);
}

// CRUD Tugas Akhir
elseif ($url === '/siptam/TugasAkhir') {
    $controller = new TugasAkhirController($db);
    $controller->index();
} elseif ($url === '/siptam/TugasAkhir/tambah') {
    $controller = new TugasAkhirController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/TugasAkhir\/edit\/(\d+)/', $url, $matches)) {
    $controller = new TugasAkhirController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/TugasAkhir\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new TugasAkhirController($db);
    $controller->delete($matches[1]);
}

elseif ($url === '/siptam/jadwal') {
    $controller = new JadwalController($db);
    $controller->index();
} elseif ($url === '/siptam/jadwal/tambah') {
    $controller = new JadwalController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/jadwal\/edit\/(\d+)/', $url, $matches)) {
    $controller = new JadwalController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/jadwal\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new JadwalController($db);
    $controller->delete($matches[1]);
}

elseif ($url === '/siptam/logbimbingan') {
    $controller = new LogBimbinganController($db);
    $controller->index();
} elseif ($url === '/siptam/logbimbingan/tambah') {
    $controller = new LogBimbinganController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/logbimbingan\/edit\/(\d+)/', $url, $matches)) {
    $controller = new LogBimbinganController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/logbimbingan\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new LogBimbinganController($db);
    $controller->delete($matches[1]);
}

elseif ($url === '/siptam/LaporanEvaluasi') {
    $controller = new LaporanEvaluasiController($db);
    $controller->index();
} elseif ($url === '/siptam/LaporanEvaluasi/tambah') {
    $controller = new LaporanEvaluasiController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/LaporanEvaluasi\/edit\/(\d+)/', $url, $matches)) {
    $controller = new LaporanEvaluasiController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/LaporanEvaluasi\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new LaporanEvaluasiController($db);
    $controller->delete($matches[1]);
}

elseif ($url === '/siptam/seminar') {
    $controller = new SeminarController($db);
    $controller->index();
} elseif ($url === '/siptam/seminar/tambah') {
    $controller = new SeminarController($db);
    $controller->create();
} elseif (preg_match('/\/siptam\/seminar\/edit\/(\d+)/', $url, $matches)) {
    $controller = new SeminarController($db);
    $controller->edit($matches[1]);
} elseif (preg_match('/\/siptam\/seminar\/hapus\/(\d+)/', $url, $matches)) {
    $controller = new SeminarController($db);
    $controller->delete($matches[1]);
}
// Jika URL tidak ditemukan
else {
    echo "404 - Page Not Found";
}
