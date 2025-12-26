<!-- /components/sidebar.php -->
<div class="col-md-2 bg-dark text-white p-3">
    <h4 class="text-center">Menu</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="view_delete_document.php">Manajemen Dokumen</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="pengguna.php">Manajemen Pengguna</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="jenis_dokumen.php">Jenis Dokumen</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="jenis_dokumen.php">Manajemen Mahasiswa</a></li>

        <!-- Menampilkan link 'Pengaturan Akun' hanya untuk pengguna yang login -->
        <li class="nav-item"><a class="nav-link text-white" href="settings.php">Pengaturan Akun</a></li>

        <!-- Kondisi untuk admin -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <li class="nav-item"><a class="nav-link text-white" href="pengguna.php">Manajemen Pengguna</a></li>
        <?php endif; ?>

        <!-- Kondisi untuk dosen atau admin -->
        <?php if ($_SESSION['role'] == 'dosen' || $_SESSION['role'] == 'admin'): ?>
            <li class="nav-item"><a class="nav-link text-white" href="settings.php">Pengaturan Akun</a></li>
        <?php endif; ?>
    </ul>
</div>
