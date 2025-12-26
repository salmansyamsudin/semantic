<?php
require_once 'Database.php';

class Auth {
    // Menangani login
    public static function login($username, $password) {
        $db = Database::getConnection();
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
        }
        return false;
    }

    // Menangani logout
    public static function logout() {
        session_unset();
        session_destroy();
    }
}
?>
