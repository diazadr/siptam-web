<?php
class BimbinganModel {
    private $conn;
    private $table = 'sesi_bimbingans';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createSesi($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, pembimbing_id, kegiatan_id, tanggal, catatan, status) 
                  VALUES (:mahasiswa_id, :pembimbing_id, :kegiatan_id, :tanggal, :catatan, :status)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':pembimbing_id', $data['pembimbing_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':tanggal', $data['tanggal']);
        $stmt->bindParam(':catatan', $data['catatan']);
        $stmt->bindParam(':status', $data['status']);
        return $stmt->execute();
    }

    public function updateFeedback($id, $feedback) {
        $query = "UPDATE $this->table SET feedback = :feedback, status = 'selesai' WHERE session_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getByMahasiswa($mahasiswa_id) {
        $query = "SELECT * FROM $this->table WHERE mahasiswa_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mahasiswa_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        // Query untuk mengambil sesi bimbingan berdasarkan ID
        $query = "SELECT * FROM $this->table WHERE session_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan data sebagai array asosiatif
    }
}
?>
