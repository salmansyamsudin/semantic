<?php
$query = "SELECT d.judul, p.nama_dosen, j.nama_jenis, d.th_doc, d.doc_id
          FROM dokumen d
          JOIN dosen p ON d.dosen_id = p.dosen_id
          JOIN jenis_dokumen j ON d.jenis_id = j.jenis_id";

class Database {
    private static $host = 'localhost'; // Host database
    private static $dbname = 'aplikasi_db'; // Nama database kamu
    private static $username = 'root'; // Username untuk koneksi ke database
    private static $password = ''; // Password untuk koneksi ke database
    private static $connection;

    // Mendapatkan koneksi menggunakan pola Singleton
    public static function getConnection() {
        // Memeriksa jika koneksi sudah ada
        if (self::$connection == null) {
            try {
                // Membuat koneksi ke database
                self::$connection = new mysqli(self::$host, self::$username, self::$password, self::$dbname);

                // Memeriksa apakah koneksi berhasil
                if (self::$connection->connect_error) {
                    die("Koneksi gagal: " . self::$connection->connect_error);
                }

                // Set karakter encoding
                self::$connection->set_charset("utf8");
            } catch (mysqli_sql_exception $e) {
                die('Koneksi gagal: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}

?>
