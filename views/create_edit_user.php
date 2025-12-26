<?php 
// Menyertakan file koneksi database
include '../config/database.php'; // Pastikan jalur file sesuai

session_start();

// Memastikan pengguna sudah login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Query untuk mengambil data pengguna
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $db->prepare($query); // Gunakan $db yang sudah didefinisikan
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc(); // Menyimpan hasil query dalam $user
} else {
    header("Location: login.php");
    exit();
}
?>

<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Ubah Informasi Pengguna</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="update_user_info.php" method="POST">
        <?php if (isset($user)): ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" disabled>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <?php else: ?>
            <div class="alert alert-danger">Data pengguna tidak ditemukan.</div>
        <?php endif; ?>
    </form>
</div>

<?php include '../components/footer.php'; ?>
