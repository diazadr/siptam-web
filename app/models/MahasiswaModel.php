<?php
class MahasiswaModel {
    private $conn;
    private $table = 'mahasiswas';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT m.mahasiswa_id, m.nim, m.jurusan, m.semester_active, 
                         u.user_id, u.username, u.email, u.role
                  FROM $this->table m
                  LEFT JOIN users u ON m.user_id = u.user_id";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan semua data
    }
    

    // Mengambil data mahasiswa berdasarkan ID dengan informasi user terkait
    public function getMahasiswaById($id) {
        $query = "SELECT m.*, u.username, u.email, u.role 
                  FROM $this->table m 
                  JOIN users u ON m.user_id = u.user_id 
                  WHERE m.mahasiswa_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Debug log
        file_put_contents('debug.log', "Query Result: " . print_r($result, true), FILE_APPEND);
    
        return $result;
    }
    
    

    public function createMahasiswa($data) {
        $query = "INSERT INTO $this->table (user_id, nim, jurusan, semester_active) 
                  VALUES (:user_id, :nim, :jurusan, :semester_active)";
        $stmt = $this->conn->prepare($query);
        $user_id = empty($data['user_id']) ? null : $data['user_id'];
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':nim', $data['nim']);
        $stmt->bindParam(':jurusan', $data['jurusan']);
        $stmt->bindParam(':semester_active', $data['semester_active']);
        return $stmt->execute();
    }

    public function updateMahasiswa($id, $data) {
        $query = "UPDATE $this->table 
                  SET user_id = :user_id,  nim = :nim, jurusan = :jurusan, semester_active = :semester_active 
                  WHERE mahasiswa_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':nim', $data['nim']);
        $stmt->bindParam(':jurusan', $data['jurusan']);
        $stmt->bindParam(':semester_active', $data['semester_active']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function deleteMahasiswa($id) {
        $query = "DELETE FROM $this->table WHERE mahasiswa_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getUsersByRole($role) {
        $query = "SELECT user_id, username, email FROM users WHERE role = :role";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchUsersByEmailOrName($keyword, $role) {
        $sql = "SELECT u.user_id, u.email 
                FROM users u
                LEFT JOIN mahasiswas m ON u.user_id = m.user_id
                WHERE (u.email LIKE :keyword OR u.username LIKE :keyword)
                  AND u.role = :role
                  AND m.user_id IS NULL";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':keyword' => "%$keyword%",
            ':role' => $role
        ]);
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
    

    public function getAllCount() {
        $query = "SELECT COUNT(*) FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['COUNT(*)'];  // Mengembalikan jumlah mahasiswa
    }
    
}
?>
