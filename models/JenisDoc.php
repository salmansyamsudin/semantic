<?php
require_once 'Database.php';

class JenisDoc {
    // Ambil total jenis dokumen
    public static function getTotalJenisDoc() {
        $db = Database::getConnection();
        $query = "SELECT COUNT(*) AS total FROM jenis_doc";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }
}
?>
