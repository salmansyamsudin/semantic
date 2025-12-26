<?php
require_once 'Database.php';

class User {
    // Ambil total pengguna
    public static function getTotalUsers() {
        $db = Database::getConnection();
        $query = "SELECT COUNT(*) AS total FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc()['total'];
    }
}
?>
