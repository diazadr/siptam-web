<?php
include_once 'app/models/TugasAkhirModel.php';
include_once 'app/models/SeminarModel.php';
include_once 'app/models/DosenModel.php';
include_once 'app/models/MahasiswaModel.php';
class SeminarController
{
    private $model;
    private $dosenModel;
    private $mahasiswaModel;
    private $TAmodel;


    public function __construct($db)
    {
        $this->model = new SeminarModel($db);
        $this->dosenModel = new DosenModel($db);
        $this->mahasiswaModel = new MahasiswaModel($db);
        $this->TAmodel = new TugasAkhirModel($db);
    }

    // Display a list of all seminars
    public function index()
    {
        $result = $this->model->getAll()->fetchAll(PDO::FETCH_ASSOC);
        include 'app/views/seminar/index.php';  // Update this path based on your view file
    }

    // Handle form submission to create a new seminar

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
            $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
            $this->model->id_dosen_pembimbing = $_POST['id_dosen_pembimbing'];
            $this->model->id_dosen_penguji = $_POST['id_dosen_penguji'];
            $this->model->tanggal = $_POST['tanggal'];
            $this->model->waktu = $_POST['waktu'];
            $this->model->tempat = $_POST['tempat'];
            $this->model->status = $_POST['status'];
            if ($this->model->create()) {
                header("Location: /siptam/seminar");
                exit;
            }
        }
        $TAlist = $this->TAmodel->getAll();
        $dosen_list = $this->dosenModel->getAll();
        $mahasiswa_list = $this->mahasiswaModel->getAll();
        include 'app/views/seminar/tambah.php';
    }

    // Show form to edit an existing seminar
    public function editForm($id)
    {
        $seminar = $this->model->getById($id);
        if ($seminar) {
            include 'app/views/seminar/edit.php';  // Update this path based on your view file
        } else {
            echo "Seminar not found.";
        }
    }

    // Handle form submission to update a seminar
    public function edit()
    {
        $this->model->id = $_POST['id'];
        $this->model->id_tugas_akhir = $_POST['id_tugas_akhir'];
        $this->model->id_mahasiswa = $_POST['id_mahasiswa'];
        $this->model->id_dosen_pembimbing = $_POST['id_dosen_pembimbing'];
        $this->model->id_dosen_penguji = $_POST['id_dosen_penguji'];
        $this->model->tanggal = $_POST['tanggal'];
        $this->model->waktu = $_POST['waktu'];
        $this->model->tempat = $_POST['tempat'];
        $this->model->status = $_POST['status'];

        if ($this->model->update()) {
            header("Location: /seminar/index");
        } else {
            echo "Failed to update seminar.";
        }
    }

    // Delete a seminar
    public function delete($id)
    {
        $this->model->id = $id;
        if ($this->model->delete()) {
            header("Location: /seminar/index");
        } else {
            echo "Failed to delete seminar.";
        }
    }

    // List seminars by specific status (e.g., 'terjadwal', 'selesai')
    public function listByStatus($status)
    {
        $seminars = $this->model->getByStatus($status);
        include 'app/views/seminar/status.php';  // Update this path based on your view file
    }
}
?>
