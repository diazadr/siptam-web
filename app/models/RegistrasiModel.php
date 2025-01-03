<?php
class RegistrasiModel {
    private $conn;
    private $table = 'registrasi';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllRegistrasi() {
        $query = "
            SELECT r.*, m.jurusan, u.username 
            FROM " . $this->table . " r
            JOIN mahasiswas m ON r.mahasiswa_id = m.mahasiswa_id
            JOIN users u ON m.user_id = u.user_id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createRegistrasi($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, kegiatan_id, payment_proof, status, registrasi_date) 
                  VALUES (:mahasiswa_id, :kegiatan_id, :payment_proof, :status, :registrasi_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':payment_proof', $data['payment_proof']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':registrasi_date', $data['registrasi_date']);
        return $stmt->execute();
    }

    public function updateRegistrasiStatus($id, $status) {
        $query = "UPDATE $this->table SET status = :status WHERE registrasi_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getRegistrasiDetail($id) {
        $query = "SELECT r.*, m.nim, k.nama_kegiatan 
                  FROM $this->table r 
                  JOIN mahasiswas m ON r.mahasiswa_id = m.mahasiswa_id 
                  JOIN kegiatan k ON r.kegiatan_id = k.kegiatan_id 
                  WHERE r.registrasi_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
