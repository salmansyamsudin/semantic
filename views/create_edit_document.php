<?php include '../components/header.php'; ?>

<div class="container">
    <h2><?= isset($document) ? 'Edit Dokumen' : 'Tambah Dokumen' ?></h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php elseif (isset($message)): ?>
        <div class="alert alert-success"><?= $message ?></div>
    <?php endif; ?>

    <form action="<?= isset($document) ? 'update_document_info.php' : 'store_document_info.php' ?>" method="POST" enctype="multipart/form-data">
        <?php if (isset($document)): ?>
            <input type="hidden" name="doc_id" value="<?= $document['doc_id'] ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= isset($document) ? htmlspecialchars($document['judul']) : '' ?>" placeholder="Masukkan Judul Dokumen" required>
        </div>

        <div class="form-group">
            <label for="dosen_id">Dosen</label>
            <select class="form-control" id="dosen_id" name="dosen_id" required>
                <option value="">Pilih Dosen</option>
                <?php foreach ($dosen_list as $dosen): ?>
                    <option value="<?= $dosen['dosen_id'] ?>" <?= isset($document) && $document['dosen_id'] == $dosen['dosen_id'] ? 'selected' : '' ?>><?= htmlspecialchars($dosen['nama_dosen']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_doc_id">Jenis Dokumen</label>
            <select class="form-control" id="jenis_doc_id" name="jenis_doc_id" required>
                <option value="">Pilih Jenis Dokumen</option>
                <?php foreach ($jenis_doc_list as $jenis_doc): ?>
                    <option value="<?= $jenis_doc['jenis_doc_id'] ?>" <?= isset($document) && $document['jenis_doc_id'] == $jenis_doc['jenis_doc_id'] ? 'selected' : '' ?>><?= htmlspecialchars($jenis_doc['nama_jenis']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="file_doc">File Dokumen</label>
            <input type="file" class="form-control" id="file_doc" name="file_doc" <?= !isset($document) ? 'required' : '' ?>>
            <?php if (isset($document)): ?>
                <p>File Saat Ini: <?= htmlspecialchars($document['file_doc']) ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="th_doc">Tahun Dokumen</label>
            <input type="text" class="form-control" id="th_doc" name="th_doc" value="<?= isset($document) ? htmlspecialchars($document['th_doc']) : '' ?>" placeholder="Masukkan Tahun Dokumen" required>
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($document) ? 'Perbarui Dokumen' : 'Tambah Dokumen' ?></button>
    </form>
</div>

<?php include '../components/footer.php'; ?>
