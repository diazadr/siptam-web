<?php
include_once 'app/models/KegiatanModel.php';
include_once 'app/models/ProposalModel.php';
include_once 'app/models/JadwalModel.php';

class KoordinatorController {
    private $kegiatanModel;
    private $proposalModel;
    private $jadwalModel;

    public function __construct($db) {
        $this->kegiatanModel = new KegiatanModel($db);
        $this->proposalModel = new ProposalModel($db);
        $this->jadwalModel = new JadwalModel($db);
    }

    public function index() {
        // Mengambil data yang diperlukan untuk dashboard
        $kegiatanCount = $this->kegiatanModel->getCountKegiatan(); // Jumlah kegiatan
        $proposalPendingCount = $this->proposalModel->getPendingProposalCount(); // Jumlah proposal menunggu
        $jadwalCount = $this->jadwalModel->getJadwalCount(); // Jumlah jadwal seminar/sidang

        // Kirim data ke view
        include 'app/views/koordinator/dashboard/index.php';
    }
}
?>
