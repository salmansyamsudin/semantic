<?php
// register_action.php
session_start();
include '../config/database.php'; // Pastikan koneksi database sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi form
    if ($password !== $confirm_password) {
        echo "Password dan konfirmasi password tidak cocok.";
        exit();
    }

    // Cek apakah username sudah digunakan
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username sudah terdaftar.";
        exit();
    }

    // Hash password sebelum menyimpannya ke database
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data pengguna baru
    $query = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'mahasiswa')";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $username, $password_hashed, $email);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! <a href='login.php'>Login sekarang</a>";
    } else {
        echo "Pendaftaran gagal: " . $stmt->error;
    }
}
?>
