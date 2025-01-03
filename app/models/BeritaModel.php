<?php
class BeritaModel {
    private $conn;
    private $table = 'berita';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllBerita() {
        $query = "SELECT * FROM $this->table ORDER BY publish_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createBerita($data) {
        $query = "INSERT INTO $this->table (jurusan, title, content, publish_date, created_by) 
                  VALUES (:jurusan, :title, :content, :publish_date, :created_by)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':jurusan', $data['jurusan']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':publish_date', $data['publish_date']);
        $stmt->bindParam(':created_by', $data['created_by']);
        return $stmt->execute();
    }
}
?>
