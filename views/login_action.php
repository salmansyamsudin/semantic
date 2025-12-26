<?php
// login_action.php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa pengguna di database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set sesi pengguna
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect ke halaman sesuai peran
            if ($user['role'] == 'admin') {
                header("Location: dashboard.php");
            } elseif ($user['role'] == 'dosen') {
                header("Location: dosen_dashboard.php");
            } elseif ($user['role'] == 'mahasiswa') {
                header("Location: mahasiswa_dashboard.php");
            }
            exit();
        } else {
            echo "Username atau password salah.";
        }
    } else {
        echo "Username atau password salah.";
    }
}
?>
