<?php
class KegiatanModel {
    private $conn;
    private $table = 'kegiatan';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getKegiatanById($id) {
        $query = "SELECT * FROM $this->table WHERE kegiatan_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllKegiatan() {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKegiatanByStatus($status) {
        $query = "SELECT * FROM $this->table WHERE status = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $status, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createKegiatan($data) {
        $query = "INSERT INTO $this->table (jurusan, nama_kegiatan, start_date, end_date, status, created_by) 
                  VALUES (:jurusan, :nama_kegiatan, :start_date, :end_date, :status, :created_by)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':jurusan', $data['jurusan']);
        $stmt->bindParam(':nama_kegiatan', $data['nama_kegiatan']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':created_by', $data['created_by']);
        return $stmt->execute();
    }

    public function updateKegiatan($id, $data) {
        $query = "UPDATE $this->table SET jurusan = :jurusan, nama_kegiatan = :nama_kegiatan, 
                  start_date = :start_date, end_date = :end_date, status = :status WHERE kegiatan_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':jurusan', $data['jurusan']);
        $stmt->bindParam(':nama_kegiatan', $data['nama_kegiatan']);
        $stmt->bindParam(':start_date', $data['start_date']);
        $stmt->bindParam(':end_date', $data['end_date']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteKegiatan($id) {
        $query = "DELETE FROM $this->table WHERE kegiatan_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getCountKegiatan() {
        $query = "SELECT COUNT(*) as kegiatan_count FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['kegiatan_count'];
    }
}
?>
