<?php
class ProposalModel {
    private $conn;
    private $table = 'proposals';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getProposalById($id) {
        $query = "SELECT * FROM $this->table WHERE proposal_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProposal($data) {
        $query = "INSERT INTO $this->table (mahasiswa_id, kegiatan_id, title, abstract, file_path, status, submission_date) 
                  VALUES (:mahasiswa_id, :kegiatan_id, :title, :abstract, :file_path, :status, :submission_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mahasiswa_id', $data['mahasiswa_id']);
        $stmt->bindParam(':kegiatan_id', $data['kegiatan_id']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':abstract', $data['abstract']);
        $stmt->bindParam(':file_path', $data['file_path']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':submission_date', $data['submission_date']);
        return $stmt->execute();
    }

    public function updateProposalStatus($id, $status) {
        $query = "UPDATE $this->table SET status = :status WHERE proposal_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getPendingProposalCount() {
        $query = "SELECT COUNT(*) as proposal_pending_count FROM " . $this->table . " WHERE status = 'menunggu'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['proposal_pending_count'];
    }
}
?>
