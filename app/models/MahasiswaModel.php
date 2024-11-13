<?php
class MahasiswaModel
{
    private $conn;
    private $table = 'mahasiswa';

    public $id;
    public $nama;
    public $nim;
    public $username;
    public $password;
    public $email;
    public $no_telepon;

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
                  (nama, nim, username, password, email, no_telepon) 
                  VALUES (:nama, :nim, :username, :password, :email, :no_telepon)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':nim', $this->nim);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
        return $stmt->execute();
    }

    public function update()
    {
        $query = "UPDATE " . $this->table . " 
                  SET nama = :nama, nim = :nim, username = :username, password = :password, 
                      email = :email, no_telepon = :no_telepon 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':nim', $this->nim);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
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
