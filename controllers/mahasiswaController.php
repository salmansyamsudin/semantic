<?php
require_once '../models/Mahasiswa.php';

class MahasiswaController {
    // Menampilkan halaman edit mahasiswa
    public function editMahasiswa($mahasiswa_id) {
        $mahasiswa = Mahasiswa::getById($mahasiswa_id);  // Ambil data mahasiswa berdasarkan ID
        include '../views/create_edit_mahasiswa.php';  // Tampilkan form edit mahasiswa
    }

    // Memperbarui informasi mahasiswa
    public function updateMahasiswa() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mahasiswa_id = $_POST['mahasiswa_id'];
            $nim = $_POST['nim'];
            $nama_mahasiswa = $_POST['nama_mahasiswa'];
            $email_mahasiswa = $_POST['email_mahasiswa'];
            $prodi = $_POST['prodi'];

            $success = Mahasiswa::update($mahasiswa_id, $nim, $nama_mahasiswa, $email_mahasiswa, $prodi);

            if ($success) {
                $message = "Informasi mahasiswa berhasil diperbarui!";
                header("Location: mahasiswa_dashboard.php");
            } else {
                $error = "Terjadi kesalahan saat memperbarui data mahasiswa.";
                include '../views/create_edit_mahasiswa.php';
            }
        }
    }

    // Menghapus mahasiswa
    public function deleteMahasiswa($mahasiswa_id) {
        Mahasiswa::delete($mahasiswa_id);
        header("Location: mahasiswa_dashboard.php");
    }

    // Menampilkan daftar mahasiswa
    public function viewMahasiswa() {
        $mahasiswa_list = Mahasiswa::getAll();  // Ambil semua data mahasiswa
        include '../views/view_mahasiswa.php';  // Tampilkan daftar mahasiswa
    }
}
?>
