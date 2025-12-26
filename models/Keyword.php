<?php
require_once 'Database.php';

class Keyword {
    public static function create($keyword) {
        $db = Database::getConnection();
        $query = "INSERT INTO keywords (keyword) VALUES (?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $keyword);
        return $stmt->execute();
    }

    public static function getAll() {
        $db = Database::getConnection();
        $query = "SELECT * FROM keywords";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
