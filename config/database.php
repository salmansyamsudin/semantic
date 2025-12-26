<?php
// db.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aplikasi_db";

// Membuat koneksi
$db = new mysqli($servername, $username, $password, $dbname); // Ganti $conn menjadi $db

// Memeriksa koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}
?>
