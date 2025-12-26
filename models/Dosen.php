<?php
require_once 'Database.php';

class Dosen {
    // Ambil total dosen
    public static function getTotalDosen() {
        $db = Database::getConnection();
        $query = "SELECT COUNT(*) AS total FROM dosen";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }
}
?>
