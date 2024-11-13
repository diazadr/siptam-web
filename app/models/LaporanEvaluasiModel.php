<?php
class LaporanEvaluasiModel
{
    private $conn;
    private $table = 'laporan_evaluasi';

    public $id;
    public $id_tugas_akhir;
    public $id_mahasiswa;
    public $id_dosen;
    public $jenis;
    public $nilai;
    public $komentar;
    public $tanggal;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Fetch all records with related mahasiswa and dosen information
    public function getAll()
    {
        $query = "SELECT le.*, m.nama AS nama_mahasiswa, d.nama AS nama_dosen
                  FROM " . $this->table . " le
                  JOIN mahasiswa m ON le.id_mahasiswa = m.id
                  JOIN dosen d ON le.id_dosen = d.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Fetch a single record by id
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new laporan evaluasi record
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_tugas_akhir, id_mahasiswa, id_dosen, jenis, nilai, komentar, tanggal) 
                  VALUES (:id_tugas_akhir, :id_mahasiswa, :id_dosen, :jenis, :nilai, :komentar, :tanggal)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_dosen', $this->id_dosen);
        $stmt->bindParam(':jenis', $this->jenis);
        $stmt->bindParam(':nilai', $this->nilai);
        $stmt->bindParam(':komentar', $this->komentar);
        $stmt->bindParam(':tanggal', $this->tanggal);
        return $stmt->execute();
    }

    // Update an existing laporan evaluasi record
    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_tugas_akhir = :id_tugas_akhir, id_mahasiswa = :id_mahasiswa, 
                      id_dosen = :id_dosen, jenis = :jenis, nilai = :nilai, 
                      komentar = :komentar, tanggal = :tanggal 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
        $stmt->bindParam(':id_mahasiswa', $this->id_mahasiswa);
        $stmt->bindParam(':id_dosen', $this->id_dosen);
        $stmt->bindParam(':jenis', $this->jenis);
        $stmt->bindParam(':nilai', $this->nilai);
        $stmt->bindParam(':komentar', $this->komentar);
        $stmt->bindParam(':tanggal', $this->tanggal);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Delete a laporan evaluasi record
    public function delete()
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Fetch all records by a specific type (e.g., 'bimbingan', 'seminar', 'sidang')
    public function getByJenis($jenis)
    {
        $query = "SELECT le.*, m.nama AS nama_mahasiswa, d.nama AS nama_dosen 
                  FROM " . $this->table . " le
                  JOIN mahasiswa m ON le.id_mahasiswa = m.id
                  JOIN dosen d ON le.id_dosen = d.id
                  WHERE le.jenis = :jenis";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':jenis', $jenis);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
