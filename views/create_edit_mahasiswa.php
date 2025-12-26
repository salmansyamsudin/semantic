<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Ubah Informasi Mahasiswa</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="update_mahasiswa_info.php" method="POST">
        <input type="hidden" name="mahasiswa_id" value="<?= $mahasiswa['mahasiswa_id'] ?>">
        
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($mahasiswa['nim']) ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_mahasiswa">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="<?= htmlspecialchars($mahasiswa['nama_mahasiswa']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email_mahasiswa">Email Mahasiswa</label>
            <input type="email" class="form-control" id="email_mahasiswa" name="email_mahasiswa" value="<?= htmlspecialchars($mahasiswa['email_mahasiswa']) ?>" required>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= htmlspecialchars($mahasiswa['prodi']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include '../components/footer.php'; ?>
