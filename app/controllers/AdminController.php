<?php

class AdminController {

    public function __construct($db) {

    }

    public function index() {


        // Kirim data ke view
        include 'app/views/akademik/dashboard/index.php';
    }
}
?>
