<?php
class PembimbingModel {
    private $conn;
    private $table = 'pembimbings';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function assignPembimbing($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, kegiatan_id, dosen_id, role, is_reviewer, assignment_date) 
                  VALUES (:mahasiswa_id, :kegiatan_id, :dosen_id, :role, :is_reviewer, :assignment_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':dosen_id', $data['dosen_id']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':is_reviewer', $data['is_reviewer']);
        $stmt->bindParam(':assignment_date', $data['assignment_date']);
        return $stmt->execute();
    }

    public function getPembimbingByMahasiswa($mahasiswa_id) {
        $query = "SELECT * FROM $this->table WHERE mahasiswa_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mahasiswa_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMahasiswaByPembimbing($dosen_id) {
        $query = "SELECT m.*, k.nama_kegiatan 
                  FROM $this->table p
                  JOIN mahasiswas m ON p.mahasiswa_id = m.mahasiswa_id
                  JOIN kegiatan k ON p.kegiatan_id = k.kegiatan_id
                  WHERE p.dosen_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $dosen_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
