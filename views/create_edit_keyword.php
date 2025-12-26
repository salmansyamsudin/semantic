<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Ubah Kata Kunci</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="update_keyword_info.php" method="POST">
        <input type="hidden" name="keyword_id" value="<?= $keyword['keyword_id'] ?>">

        <div class="form-group">
            <label for="keyword">Kata Kunci</label>
            <input type="text" class="form-control" id="keyword" name="keyword" value="<?= htmlspecialchars($keyword['keyword']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include '../components/footer.php'; ?>
