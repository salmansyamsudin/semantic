<?php
// Mengimpor file database.php yang berisi kelas Database
include '../models/Database.php';  // Sesuaikan jalur jika diperlukan

// Mendapatkan koneksi ke database
$db = Database::getConnection();

$query = "SELECT d.judul, p.nama_dosen, j.nama_jenis, d.th_doc, d.doc_id
          FROM dokumen d
          JOIN dosen p ON d.dosen_id = p.dosen_id
          JOIN jenis_doc j ON d.jenis_id = j.jenis_doc_id";  // Perbaikan: ganti jenis_id dengan jenis_doc_id
$document_list = $db->query($query);  // Menjalankan query dan menyimpan hasilnya

if ($document_list === false) {
    // Tangani jika query gagal
    echo "Terjadi kesalahan dalam mengambil data: " . $db->error;
}
?>

<?php include '../components/header.php'; ?>

<div class="container">
    <h2>Daftar Dokumen</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Dosen</th>
                <th>Jenis Dokumen</th>
                <th>Tahun Dokumen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($document_list->num_rows > 0) {
                // Jika ada data, tampilkan dalam tabel
                while ($document = $document_list->fetch_assoc()):
            ?>
                <tr>
                    <td><?= htmlspecialchars($document['judul']) ?></td>
                    <td><?= htmlspecialchars($document['nama_dosen']) ?></td>
                    <td><?= htmlspecialchars($document['nama_jenis']) ?></td>
                    <td><?= htmlspecialchars($document['th_doc']) ?></td>
                    <td>
                        <!-- Tombol Edit dan Hapus -->
                        <a href="edit_document.php?id=<?= $document['doc_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete_document.php?id=<?= $document['doc_id'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php 
                endwhile;
            } else {
                echo "<tr><td colspan='5'>Tidak ada dokumen yang ditemukan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../components/footer.php'; ?>
