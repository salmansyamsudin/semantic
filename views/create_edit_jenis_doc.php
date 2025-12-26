<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Ubah Jenis Dokumen</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="update_jenis_doc_info.php" method="POST">
        <input type="hidden" name="jenis_doc_id" value="<?= $jenis_doc['jenis_doc_id'] ?>">

        <div class="form-group">
            <label for="nama_jenis">Nama Jenis Dokumen</label>
            <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="<?= htmlspecialchars($jenis_doc['nama_jenis']) ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi_jenis">Deskripsi Jenis Dokumen</label>
            <textarea class="form-control" id="deskripsi_jenis" name="deskripsi_jenis" required><?= htmlspecialchars($jenis_doc['deskripsi_jenis']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

<?php include '../components/footer.php'; ?>
