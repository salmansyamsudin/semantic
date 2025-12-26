<?php
$page_title = "Dashboard Admin";

// Memulai session
session_start();
include('../components/header.php');
include('../config/database.php');

// Cek apakah pengguna adalah admin
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php"); // Redirect jika bukan admin
    exit();
}

// Mengambil data statistik menggunakan model
require_once '../models/Document.php';
require_once '../models/Dosen.php';
require_once '../models/User.php';
require_once '../models/JenisDoc.php';
require_once '../models/Database.php';

// Ambil data statistik (jumlah dokumen, dosen, pengguna, dll.)
$total_dokumen = Document::getTotalDocuments();
$total_dosen = Dosen::getTotalDosen();
$total_pengguna = User::getTotalUsers();
$total_jenis_doc = JenisDoc::getTotalJenisDoc();

// Ambil daftar dokumen terbaru
$document_list = Document::getRecentDocuments();  // Ambil 5 dokumen terbaru

?>

<div class="container-fluid">
    <div class="row">
        <?php include('../components/sidebar.php'); ?>

        <div class="col-md-10">
            <div class="container mt-4">
                <h2>Dashboard Admin</h2>

                <!-- Statistik -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Total Dokumen</h5>
                                <h3><?php echo $total_dokumen; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Total Dosen</h5>
                                <h3><?php echo $total_dosen; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Total Pengguna</h5>
                                <h3><?php echo $total_pengguna; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5>Total Jenis Dokumen</h5>
                                <h3><?php echo $total_jenis_doc; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Dokumen Terbaru -->
                <h4>Daftar Dokumen Terbaru</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Dosen</th>
                            <th>Jenis Dokumen</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($document_list as $doc): ?>
                        <tr>
                            <td><?php echo $doc['judul']; ?></td>
                            <td><?php echo $doc['nama_dosen']; ?></td>
                            <td><?php echo $doc['nama_jenis']; ?></td>
                            <td><?php echo $doc['th_doc']; ?></td>
                            <td>
                                <a href="view_document.php?doc_id=<?php echo $doc['doc_id']; ?>" class="btn btn-info">Lihat</a>
                                <a href="edit_document.php?doc_id=<?php echo $doc['doc_id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete_document.php?doc_id=<?php echo $doc['doc_id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Link ke Halaman CRUD Dokumen -->
                <a href="create_document.php" class="btn btn-primary mt-3">Tambah Dokumen Baru</a>
            </div>
        </div>
    </div>
</div>

<?php include('../components/footer.php'); ?>
