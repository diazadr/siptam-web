<?php
class TugasAkhirModel
{
    private $conn;
    private $table = 'tugas_akhir';

    public $id;
    public $judul;
    public $deskripsi;
    public $id_mahasiswa;
    public $id_pembimbing;
    public $id_penguji;
    public $status;
    public $tanggal_pengajuan;
    public $tanggal_selesai;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT ta.*, m.nama AS nama_mahasiswa, dp.nama AS nama_pembimbing, d.nama AS nama_penguji 
                  FROM " . $this->table . " ta
                  JOIN mahasiswa m ON ta.id_mahasiswa = m.id
                  LEFT JOIN dosen dp ON ta.id_pembimbing = dp.id
                  LEFT JOIN dosen d ON ta.id_penguji = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " 
                  (judul, deskripsi, id_mahasiswa, id_pembimbing, id_penguji, status, tanggal_pengajuan, tanggal_selesai) 
                  VALUES (:judul, :deskripsi, :id_mahasiswa, :id_pembimbing, :id_penguji, :status, :tanggal_pengajuan, :tanggal_selesai)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $this->judul);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_pembimbing', $this->id_pembimbing);
        $stmt->bindParam(':id_penguji', $this->id_penguji);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':tanggal_pengajuan', $this->tanggal_pengajuan);
        $stmt->bindParam(':tanggal_selesai', $this->tanggal_selesai);
        return $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET judul = :judul, deskripsi = :deskripsi, 
                      id_mahasiswa = :id_mahasiswa, id_pembimbing = :id_pembimbing, 
                      id_penguji = :id_penguji, status = :status, 
                      tanggal_pengajuan = :tanggal_pengajuan, tanggal_selesai = :tanggal_selesai 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul', $this->judul);
        $stmt->bindParam(':deskripsi', $this->deskripsi);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_pembimbing', $this->id_pembimbing);
        $stmt->bindParam(':id_penguji', $this->id_penguji);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':tanggal_pengajuan', $this->tanggal_pengajuan);
        $stmt->bindParam(':tanggal_selesai', $this->tanggal_selesai);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    public function beriPenilaian($id, $nilai, $feedback)
    {
        $query = "UPDATE " . $this->table . " 
                  SET nilai = :nilai, feedback = :feedback 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nilai', $nilai);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function updateStatusSidang($id, $status_sidang)
    {
        $query = "UPDATE " . $this->table . " 
                  SET status_sidang = :status_sidang 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status_sidang', $status_sidang);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    public function getRiwayatSidang($semester)
    {
        $query = "SELECT ta.*, m.nama AS nama_mahasiswa, d.nama AS nama_penguji 
                  FROM " . $this->table . " ta
                  JOIN mahasiswa m ON ta.id_mahasiswa = m.id
                  LEFT JOIN dosen d ON ta.id_penguji = d.id
                  WHERE ta.semester = :semester";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':semester', $semester);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verifikasiKehadiran($id, $kehadiran)
    {
        $query = "UPDATE " . $this->table . " 
                  SET kehadiran = :kehadiran 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kehadiran', $kehadiran);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
