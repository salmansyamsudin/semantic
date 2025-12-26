<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Daftar Kata Kunci</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kata Kunci</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($keyword = $keyword_list->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($keyword['keyword']) ?></td>
                    <td>
                        <a href="edit_keyword.php?id=<?= $keyword['keyword_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_keyword.php?id=<?= $keyword['keyword_id'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../components/footer.php'; ?>
