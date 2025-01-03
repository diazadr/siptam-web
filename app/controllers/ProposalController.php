<?php
class ProposalController {
    private $model;

    public function __construct($db) {
        $this->model = new ProposalModel($db);
    }

    public function submit() {
        // Digunakan oleh Mahasiswa untuk mengunggah proposal
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'kegiatan_id' => $_POST['kegiatan_id'],
                'title' => $_POST['title'],
                'abstract' => $_POST['abstract'],
                'file_path' => $_POST['file_path'],
                'status' => 'menunggu',
                'submission_date' => date('Y-m-d H:i:s')
            ];
            if ($this->model->createProposal($data)) {
                header("Location: /proposal");
                exit;
            }
        }
        include 'app/views/proposal/submit.php';
    }

    public function approve($id) {
        // Digunakan oleh Koordinator untuk menyetujui proposal
        if ($this->model->updateProposalStatus($id, 'disetujui')) {
            header("Location: /proposal");
            exit;
        }
    }

    public function reject($id) {
        // Digunakan oleh Koordinator untuk menolak proposal
        if ($this->model->updateProposalStatus($id, 'ditolak')) {
            header("Location: /proposal");
            exit;
        }
    }

    public function detail($id) {
        // Digunakan oleh Mahasiswa atau Koordinator untuk melihat detail proposal
        $proposal = $this->model->getProposalById($id);
        include 'app/views/proposal/detail.php';
    }
}
?>
