<?php
class SeminarModel
{
    private $conn;
    private $table = 'seminar';

    public $id;
    public $id_tugas_akhir;
    public $id_mahasiswa;
    public $id_dosen_pembimbing;
    public $id_dosen_penguji;
    public $tanggal;
    public $waktu;
    public $tempat;
    public $status;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all seminars with related mahasiswa and dosen information
    public function getAll()
    {
        $query = "SELECT s.*, m.nama AS nama_mahasiswa, dp.nama AS nama_dosen_pembimbing, d.nama AS nama_dosen_penguji 
                  FROM " . $this->table . " s
                  JOIN mahasiswa m ON s.id_mahasiswa = m.id
                  JOIN dosen dp ON s.id_dosen_pembimbing = dp.id
                  JOIN dosen d ON s.id_dosen_penguji = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Get a single seminar by ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new seminar record
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_tugas_akhir, id_mahasiswa, id_dosen_pembimbing, id_dosen_penguji, tanggal, waktu, tempat, status) 
                  VALUES (:id_tugas_akhir, :id_mahasiswa, :id_dosen_pembimbing, :id_dosen_penguji, :tanggal, :waktu, :tempat, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_dosen_pembimbing', $this->id_dosen_pembimbing);
        $stmt->bindParam(':id_dosen_penguji', $this->id_dosen_penguji);
        $stmt->bindParam(':tanggal', $this->tanggal);
        $stmt->bindParam(':waktu', $this->waktu);
        $stmt->bindParam(':tempat', $this->tempat);
        $stmt->bindParam(':status', $this->status);
        return $stmt->execute();
    }

    // Update an existing seminar record
    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_tugas_akhir = :id_tugas_akhir, id_mahasiswa = :id_mahasiswa, 
                      id_dosen_pembimbing = :id_dosen_pembimbing, id_dosen_penguji = :id_dosen_penguji, 
                      tanggal = :tanggal, waktu = :waktu, tempat = :tempat, status = :status 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_dosen_pembimbing', $this->id_dosen_pembimbing);
        $stmt->bindParam(':id_dosen_penguji', $this->id_dosen_penguji);
        $stmt->bindParam(':tanggal', $this->tanggal);
        $stmt->bindParam(':waktu', $this->waktu);
        $stmt->bindParam(':tempat', $this->tempat);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Delete a seminar record
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Get seminars by specific status (e.g., 'terjadwal', 'selesai')
    public function getByStatus($status)
    {
        $query = "SELECT s.*, m.nama AS nama_mahasiswa, dp.nama AS nama_dosen_pembimbing, d.nama AS nama_dosen_penguji 
                  FROM " . $this->table . " s
                  JOIN mahasiswa m ON s.id_mahasiswa = m.id
                  JOIN dosen dp ON s.id_dosen_pembimbing = dp.id
                  JOIN dosen d ON s.id_dosen_penguji = d.id
                  WHERE s.status = :status";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>