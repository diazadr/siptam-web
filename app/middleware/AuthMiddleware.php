<?php
class AuthMiddleware {
    public static function checkLogin() {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /siptam');
            exit;
        }
    }

    public static function checkRole($allowedRoles = []) {
        self::checkLogin();

        if (!in_array($_SESSION['role'], $allowedRoles)) {
            header('Location: /siptam');
            exit;
        }
    }
}
?>
