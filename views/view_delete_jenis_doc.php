<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Daftar Jenis Dokumen</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Jenis</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($jenis_doc = $jenis_doc_list->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($jenis_doc['nama_jenis']) ?></td>
                    <td><?= htmlspecialchars($jenis_doc['deskripsi_jenis']) ?></td>
                    <td>
                        <a href="edit_jenis_doc.php?id=<?= $jenis_doc['jenis_doc_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_jenis_doc.php?id=<?= $jenis_doc['jenis_doc_id'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../components/footer.php'; ?>
