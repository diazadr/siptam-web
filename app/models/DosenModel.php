<?php
class DosenModel
{
    private $db;
    public $id;
    public $nama;
    public $username;
    public $password;
    public $role;
    public $email;
    public $no_telepon;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Mengambil seluruh data dosen
    public function getAll()
    {
        $query = "SELECT * FROM dosen";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengambil data dosen berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM dosen WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menyimpan data dosen baru
    public function create()
    {
        $query = "INSERT INTO dosen (nama, username, password, role, email, no_telepon) 
                  VALUES (:nama, :username, :password, :role, :email, :no_telepon)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
        return $stmt->execute();
    }

    // Mengupdate data dosen
    public function update()
    {
        $query = "UPDATE dosen SET nama = :nama, username = :username, password = :password, 
                  role = :role, email = :email, no_telepon = :no_telepon WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':no_telepon', $this->no_telepon);
        return $stmt->execute();
    }

    // Menghapus data dosen
    public function delete()
    {
        $query = "DELETE FROM dosen WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }

    // Menyimpan penilaian dan feedback
    public function simpanPenilaian($id_mahasiswa, $penilaian, $feedback)
    {
        $query = "INSERT INTO penilaian (id_mahasiswa, penilaian, feedback) VALUES (:id_mahasiswa, :penilaian, :feedback)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_mahasiswa', $id_mahasiswa);
        $stmt->bindParam(':penilaian', $penilaian);
        $stmt->bindParam(':feedback', $feedback);
        return $stmt->execute();
    }

    // Mendapatkan data mahasiswa berdasarkan ID
    public function getMahasiswaById($id_mahasiswa)
    {
        $query = "SELECT * FROM mahasiswa WHERE id = :id_mahasiswa";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_mahasiswa', $id_mahasiswa);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan progres sidang mahasiswa
    public function getProgresSidang($id_mahasiswa)
    {
        $query = "SELECT * FROM progres_sidang WHERE id_mahasiswa = :id_mahasiswa";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_mahasiswa', $id_mahasiswa);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mendapatkan riwayat sidang
    public function getRiwayatSidang()
    {
        $query = "SELECT * FROM riwayat_sidang";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
