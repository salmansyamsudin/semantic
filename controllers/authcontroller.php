<?php
require_once '../models/Auth.php';

class AuthController {
    // Menangani login pengguna
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (Auth::login($username, $password)) {
                header("Location: dashboard.php");
            } else {
                $error = "Username atau password salah!";
                include '../views/login.php';
            }
        } else {
            include '../views/login.php';
        }
    }

    // Menangani logout pengguna
    public function logout() {
        Auth::logout();
        header("Location: login.php");
    }
}
?>
