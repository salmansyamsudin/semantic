<?php
require_once '../models/Dosen.php';

class DosenController {
    // Menampilkan halaman edit dosen
    public function editDosen($dosen_id) {
        $dosen = Dosen::getById($dosen_id);  // Ambil data dosen berdasarkan ID
        include '../views/create_edit_dosen.php';  // Tampilkan form edit dosen
    }

    // Memperbarui informasi dosen
    public function updateDosen() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dosen_id = $_POST['dosen_id'];
            $nidn = $_POST['nidn'];
            $nama_dosen = $_POST['nama_dosen'];
            $email_dosen = $_POST['email_dosen'];
            $prodi = $_POST['prodi'];

            $success = Dosen::update($dosen_id, $nidn, $nama_dosen, $email_dosen, $prodi);

            if ($success) {
                $message = "Informasi dosen berhasil diperbarui!";
                header("Location: dosen_dashboard.php");
            } else {
                $error = "Terjadi kesalahan saat memperbarui data dosen.";
                include '../views/create_edit_dosen.php';
            }
        }
    }

    // Menghapus dosen
    public function deleteDosen($dosen_id) {
        Dosen::delete($dosen_id);
        header("Location: dosen_dashboard.php");
    }

    // Menampilkan daftar dosen
    public function viewDosen() {
        $dosen_list = Dosen::getAll();  // Ambil semua data dosen
        include '../views/view_dosen.php';  // Tampilkan daftar dosen
    }
}
?>
