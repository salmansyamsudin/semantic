<?php  

include('../config/database.php');
?>
<!-- /components/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title> <!-- Menggunakan variabel dinamis untuk judul halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <!-- Logo dan Nama Aplikasi -->
            <a class="navbar-brand" href="#">Sistem Pencarian Dokumen</a>
            
            <!-- Tombol Toggle untuk Mobile View -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Menyusun menu ke kanan -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dokumentasi.php">Manajemen Dokumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengguna.php">Manajemen Pengguna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jenis_dokumen.php">Jenis Dokumen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Pengaturan Akun</a>
                    </li>
                </ul>
                <!-- User Profile di kanan -->
                <div class="d-flex align-items-center">
                    <span class="me-3"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest' ?></span>
                </div>

            </div>
        </div>
    </nav>
