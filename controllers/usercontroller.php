<?php
require_once '../models/User.php';

class UserController {
    // Menampilkan halaman edit pengguna
    public function editUser($user_id) {
        $user = User::getById($user_id);  // Ambil data pengguna berdasarkan ID
        include '../views/create_edit_user.php';  // Tampilkan form edit user
    }

    // Memperbarui informasi pengguna
    public function updateUserInfo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'];  // Ambil ID pengguna dari session
            $new_email = $_POST['email'];
            $new_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Validasi password dan konfirmasi password
            if ($new_password !== $confirm_password) {
                $error = "Password dan konfirmasi password tidak cocok!";
                include '../views/create_edit_user.php';
                return;
            }

            // Validasi apakah email sudah tersedia
            if (!User::isEmailAvailable($new_email)) {
                $error = "Email sudah terdaftar!";
                include '../views/create_edit_user.php';
                return;
            }

            // Proses update informasi
            $success = User::updateUserInfo($user_id, $new_password, $new_email);

            if ($success) {
                $message = "Informasi berhasil diperbarui!";
                header("Location: dashboard.php");
            } else {
                $error = "Terjadi kesalahan saat memperbarui data.";
                include '../views/create_edit_user.php';
            }
        }
    }
}
?>
