<?php
class JadwalModel {
    private $conn;
    private $table = 'jadwals';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createJadwal($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, kegiatan_id, type, tanggal, waktu, lokasi, status) 
                  VALUES (:mahasiswa_id, :kegiatan_id, :type, :tanggal, :waktu, :lokasi, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':waktu', $data['waktu']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':status', $data['status']);
        return $stmt->execute();
    }

    public function getUpcomingJadwal($user_id) {
        $query = "SELECT * FROM $this->table WHERE mahasiswa_id = ? AND status = 'dijadwalkan' ORDER BY tanggal ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJadwalCount() {
        $query = "SELECT COUNT(*) as jadwal_count FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['jadwal_count'];
    }
}
?>
