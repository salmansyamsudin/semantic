<?php
require_once 'Database.php';

class Document {
    // Ambil total dokumen
    public static function getTotalDocuments() {
        $conn = Database::getConnection();
        $query = "SELECT COUNT(*) AS total FROM n_doc";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }

    // Ambil 5 dokumen terbaru
    public static function getRecentDocuments() {
        $db = Database::getConnection();
        $query = "SELECT n_doc.*, dosen.nama_dosen, jenis_doc.nama_jenis
                  FROM n_doc
                  JOIN dosen ON n_doc.dosen_id = dosen.dosen_id
                  JOIN jenis_doc ON n_doc.jenis_doc_id = jenis_doc.jenis_doc_id
                  ORDER BY n_doc.th_doc DESC LIMIT 5";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
