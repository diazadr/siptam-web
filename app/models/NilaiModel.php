<?php
class NilaiModel {
    private $conn;
    private $table = 'nilais';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createNilai($data) {
        $query = "INSERT INTO $this->table (jadwal_id, penguji_id, score, comments) 
                  VALUES (:jadwal_id, :penguji_id, :score, :comments)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':jadwal_id', $data['jadwal_id']);
        $stmt->bindParam(':penguji_id', $data['penguji_id']);
        $stmt->bindParam(':score', $data['score']);
        $stmt->bindParam(':comments', $data['comments']);
        return $stmt->execute();
    }

    public function getNilaiByMahasiswa($mahasiswa_id) {
        $query = "SELECT n.*, j.type, j.tanggal 
                  FROM $this->table n 
                  JOIN jadwals j ON n.jadwal_id = j.jadwal_id 
                  WHERE j.mahasiswa_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mahasiswa_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
