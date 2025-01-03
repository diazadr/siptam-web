<?php
class NotifikasiModel {
    private $conn;
    private $table = 'notifikasis';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createNotifikasi($data) {
        $query = "INSERT INTO $this->table (user_id, message, status, timestamp) 
                  VALUES (:user_id, :message, :status, :timestamp)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':message', $data['message']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':timestamp', $data['timestamp']);
        return $stmt->execute();
    }

    public function getNotifikasiByUser($user_id) {
        $query = "SELECT * FROM $this->table WHERE user_id = ? ORDER BY timestamp DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function markAsRead($id) {
        $query = "UPDATE $this->table SET status = 'dibaca' WHERE notifikasi_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
