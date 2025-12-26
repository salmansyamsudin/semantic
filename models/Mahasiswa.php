<?php
require_once 'Database.php';

class Mahasiswa {
    // Menambahkan mahasiswa baru
    public static function create($nim, $nama_mahasiswa, $email_mahasiswa, $prodi) {
        $db = Database::getConnection();
        $query = "INSERT INTO mahasiswa (nim, nama_mahasiswa, email_mahasiswa, prodi) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssss", $nim, $nama_mahasiswa, $email_mahasiswa, $prodi);
        return $stmt->execute();
    }

    // Mengambil mahasiswa berdasarkan ID
    public static function getById($mahasiswa_id) {
        $db = Database::getConnection();
        $query = "SELECT * FROM mahasiswa WHERE mahasiswa_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $mahasiswa_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Memperbarui informasi mahasiswa
    public static function update($mahasiswa_id, $nim, $nama_mahasiswa, $email_mahasiswa, $prodi) {
        $db = Database::getConnection();
        $query = "UPDATE mahasiswa SET nim = ?, nama_mahasiswa = ?, email_mahasiswa = ?, prodi = ? WHERE mahasiswa_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssssi", $nim, $nama_mahasiswa, $email_mahasiswa, $prodi, $mahasiswa_id);
        return $stmt->execute();
    }

    // Menghapus mahasiswa berdasarkan ID
    public static function delete($mahasiswa_id) {
        $db = Database::getConnection();
        $query = "DELETE FROM mahasiswa WHERE mahasiswa_id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $mahasiswa_id);
        return $stmt->execute();
    }

    // Mengambil semua mahasiswa
    public static function getAll() {
        $db = Database::getConnection();
        $query = "SELECT * FROM mahasiswa";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
