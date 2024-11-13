<?php
class FeedbackModel
{
    private $conn;
    private $table = 'feedback';

    public $id;
    public $id_log_bimbingan;
    public $feedback;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
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
                  (id_log_bimbingan, feedback) 
                  VALUES (:id_log_bimbingan, :feedback)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_log_bimbingan', $this->id_log_bimbingan);
        $stmt->bindParam(':feedback', $this->feedback);
        return $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_log_bimbingan = :id_log_bimbingan, feedback = :feedback 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_log_bimbingan', $this->id_log_bimbingan);
        $stmt->bindParam(':feedback', $this->feedback);
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
}
