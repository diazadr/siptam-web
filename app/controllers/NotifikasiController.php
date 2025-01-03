<?php
class NotifikasiController {
    private $model;

    public function __construct($db) {
        $this->model = new NotifikasiModel($db);
    }

    public function create($user_id, $message) {
        // Digunakan oleh Sistem untuk membuat notifikasi baru
        $data = [
            'user_id' => $user_id,
            'message' => $message,
            'status' => 'belum dibaca',
            'timestamp' => date('Y-m-d H:i:s')
        ];
        $this->model->createNotifikasi($data);
    }

    public function listByUser($user_id) {
        // Digunakan oleh semua pengguna untuk melihat notifikasi mereka
        $notifikasis = $this->model->getNotifikasiByUser($user_id);
        include 'app/views/notifikasi/list.php';
    }

    public function markAsRead($id) {
        // Digunakan oleh semua pengguna untuk menandai notifikasi sebagai dibaca
        if ($this->model->markAsRead($id)) {
            header("Location: /notifikasi");
            exit;
        }
    }
}
?>
