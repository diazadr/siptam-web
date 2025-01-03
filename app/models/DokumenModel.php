<?php
class DokumenModel {
    private $conn;
    private $table = 'dokumens';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDokumenByType($mahasiswa_id, $type) {
        $query = "SELECT * FROM $this->table WHERE mahasiswa_id = ? AND dokumen_type = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mahasiswa_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $type, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDokumen($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, kegiatan_id, dokumen_type, file_path, status, upload_date) 
                  VALUES (:mahasiswa_id, :kegiatan_id, :dokumen_type, :file_path, :status, :upload_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':dokumen_type', $data['dokumen_type']);
        $stmt->bindParam(':file_path', $data['file_path']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':upload_date', $data['upload_date']);
        return $stmt->execute();
    }
}
?>
