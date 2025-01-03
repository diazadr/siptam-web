<?php
class UserModel {
    private $conn;
    private $table = 'users';

    public $user_id;
    public $username;
    public $password;
    public $email;
    public $role;
    public $created_at;
    public $updated_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mendapatkan semua pengguna
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Mendapatkan pengguna berdasarkan ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan pengguna berdasarkan role
    public function getByRole($role) {
        $query = "SELECT * FROM " . $this->table . " WHERE role = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $role, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Membuat pengguna baru
    public function create() {
        $query = "INSERT INTO " . $this->table . " (username, password, email, role) 
                  VALUES (:username, :password, :email, :role)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password); // Pastikan sudah dienkripsi sebelum disimpan
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':role', $this->role);

        return $stmt->execute();
    }

    // Memperbarui data pengguna
    public function update() {
        $query = "UPDATE " . $this->table . " SET username = :username, email = :email, 
                  role = :role, password = :password WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password); // Pastikan sudah dienkripsi sebelum disimpan
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Menghapus pengguna berdasarkan ID
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Verifikasi login pengguna
    public function authenticate($username, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Pastikan password diverifikasi dengan hashing (misalnya, password_verify)
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
?>
