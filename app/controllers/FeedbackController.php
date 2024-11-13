<?php
include_once 'app/models/FeedbackModel.php';
include_once 'app/models/DosenModel.php';
include_once 'app/models/TugasAkhirModel.php';

class FeedbackController {
    private $model;

    public function __construct($db) {
        $this->model = new FeedbackModel($db);
    }

    // Display all feedback
    public function index() {
        $result = $this->model->getAll();
        include 'app/views/feedback/index.php';
    }

    // Add a new feedback entry
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id_log_bimbingan = $_POST['id_log_bimbingan'];
            $this->model->feedback = $_POST['feedback'];
            if ($this->model->create()) {
                header("Location: /siptam/feedback");
                exit;
            }
        }
        include 'app/views/feedback/tambah.php';
    }

    // Edit an existing feedback entry
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id = $id;
            $this->model->id_log_bimbingan = $_POST['id_log_bimbingan'];
            $this->model->feedback = $_POST['feedback'];
            if ($this->model->update()) {
                header("Location: /feedback");
                exit;
            }
        }
        $feedback = $this->model->getById($id);
        include 'app/views/feedback/edit.php';
    }

    // Delete a feedback entry by ID
    public function delete($id) {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /feedback");
            exit;
        }
    }

    // View a specific feedback entry by ID
    public function view($id) {
        $feedback = $this->model->getById($id);
        include 'app/views/feedback/view.php';
    }
}
