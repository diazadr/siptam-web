<?php
class JadwalModel
{
    private $conn;
    private $table = 'jadwal';

    public $id;
    public $id_tugas_akhir;
    public $jenis;
    public $tanggal;
    public $waktu;
    public $tempat;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Mendapatkan semua jadwal
    public function getAll()
    {
        // try {
        //     $query = "SELECT * FROM " . $this->table;
        //     $stmt = $this->conn->prepare($query);
        //     $stmt->execute();
        //     return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan array asosiatif
        // } catch (Exception $e) {
        //     throw new Exception("Error fetching all jadwal: " . $e->getMessage());
        // }
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Mendapatkan jadwal berdasarkan ID
    public function getById($id)
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception("Error fetching jadwal by ID: " . $e->getMessage());
        }
    }

    // Menambahkan jadwal baru
    public function create()
    {
        try {
            $query = "INSERT INTO " . $this->table . " 
                      (id_tugas_akhir, jenis, tanggal, waktu, tempat) 
                      VALUES (:id_tugas_akhir, :jenis, :tanggal, :waktu, :tempat)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
            $stmt->bindParam(':jenis', $this->jenis);
            $stmt->bindParam(':tanggal', $this->tanggal);
            $stmt->bindParam(':waktu', $this->waktu);
            $stmt->bindParam(':tempat', $this->tempat);
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Error inserting jadwal: " . $e->getMessage());
        }
    }

    // Memperbarui jadwal yang ada
    public function update()
    {
        try {
            $query = "UPDATE " . $this->table . " 
                      SET id_tugas_akhir = :id_tugas_akhir, jenis = :jenis, 
                          tanggal = :tanggal, waktu = :waktu, tempat = :tempat 
                      WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_tugas_akhir', $this->id_tugas_akhir);
            $stmt->bindParam(':jenis', $this->jenis);
            $stmt->bindParam(':tanggal', $this->tanggal);
            $stmt->bindParam(':waktu', $this->waktu);
            $stmt->bindParam(':tempat', $this->tempat);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Error updating jadwal: " . $e->getMessage());
        }
    }

    // Menghapus jadwal berdasarkan ID
    public function delete()
    {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            return $stmt->execute();
        } catch (Exception $e) {
            throw new Exception("Error deleting jadwal: " . $e->getMessage());
        }
    }
}

