<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Ubah Informasi Dosen</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="update_dosen_info.php" method="POST">
        <input type="hidden" name="dosen_id" value="<?= $dosen['dosen_id'] ?>">
        
        <div class="form-group">
            <label for="nidn">NIDN</label>
            <input type="text" class="form-control" id="nidn" name="nidn" value="<?= htmlspecialchars($dosen['nidn']) ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_dosen">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= htmlspecialchars($dosen['nama_dosen']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email_dosen">Email Dosen</label>
            <input type="email" class="form-control" id="email_dosen" name="email_dosen" value="<?= htmlspecialchars($dosen['email_dosen']) ?>" required>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= htmlspecialchars($dosen['prodi']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include '../components/footer.php'; ?>
