<?php
require_once '../models/Document.php';
require_once '../models/Dosen.php';
require_once '../models/JenisDoc.php';

class DocumentController {

    // Menampilkan halaman untuk membuat dokumen baru
    public function createDocument() {
        // Ambil data dosen dan jenis dokumen untuk ditampilkan di form
        $dosen_list = Dosen::getAll();
        $jenis_doc_list = JenisDoc::getAll();
        include '../views/create_edit_document.php';  // Tampilkan form untuk membuat dokumen
    }

    // Menambahkan dokumen baru
    public function storeDocument() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $dosen_id = $_POST['dosen_id'];
            $jenis_doc_id = $_POST['jenis_doc_id'];
            $file_doc = $_FILES['file_doc']['name'];
            $th_doc = $_POST['th_doc'];

            // Validasi file dokumen
            if (empty($file_doc)) {
                $error = "File dokumen tidak boleh kosong!";
                include '../views/create_edit_document.php';
                return;
            }

            // Pindahkan file dokumen ke folder yang sesuai
            $upload_dir = "../uploads/";
            $target_file = $upload_dir . basename($file_doc);
            if (move_uploaded_file($_FILES['file_doc']['tmp_name'], $target_file)) {
                // Jika file berhasil di-upload, simpan informasi dokumen ke database
                $success = Document::create($judul, $dosen_id, $jenis_doc_id, $file_doc, $th_doc);

                if ($success) {
                    $message = "Dokumen berhasil ditambahkan!";
                    header("Location: dokumentasi.php");
                } else {
                    $error = "Terjadi kesalahan saat menyimpan dokumen.";
                    include '../views/create_edit_document.php';
                }
            } else {
                $error = "Gagal mengunggah file.";
                include '../views/create_edit_document.php';
            }
        }
    }

    // Menampilkan halaman untuk mengedit dokumen
    public function editDocument($doc_id) {
        $document = Document::getById($doc_id);  // Ambil data dokumen berdasarkan ID
        $dosen_list = Dosen::getAll();  // Ambil daftar dosen untuk ditampilkan di form
        $jenis_doc_list = JenisDoc::getAll();  // Ambil daftar jenis dokumen
        include '../views/create_edit_document.php';  // Tampilkan form untuk mengedit dokumen
    }

    // Memperbarui dokumen
    public function updateDocument() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $doc_id = $_POST['doc_id'];
            $judul = $_POST['judul'];
            $dosen_id = $_POST['dosen_id'];
            $jenis_doc_id = $_POST['jenis_doc_id'];
            $file_doc = $_FILES['file_doc']['name'];
            $th_doc = $_POST['th_doc'];

            // Jika file dokumen diubah
            if (!empty($file_doc)) {
                // Pindahkan file dokumen ke folder yang sesuai
                $upload_dir = "../uploads/";
                $target_file = $upload_dir . basename($file_doc);
                move_uploaded_file($_FILES['file_doc']['tmp_name'], $target_file);
            }

            // Perbarui informasi dokumen di database
            $success = Document::update($doc_id, $judul, $dosen_id, $jenis_doc_id, $file_doc, $th_doc);

            if ($success) {
                $message = "Dokumen berhasil diperbarui!";
                header("Location: dokumentasi.php");
            } else {
                $error = "Terjadi kesalahan saat memperbarui dokumen.";
                include '../views/create_edit_document.php';
            }
        }
    }

    // Menghapus dokumen
    public function deleteDocument($doc_id) {
        // Mengambil nama file dokumen yang akan dihapus
        $document = Document::getById($doc_id);
        $file_path = "../uploads/" . $document['file_doc'];

        // Hapus dokumen dari database dan file dari server
        if (Document::delete($doc_id)) {
            if (file_exists($file_path)) {
                unlink($file_path);  // Menghapus file dokumen dari server
            }
            header("Location: dokumentasi.php");
        } else {
            $error = "Gagal menghapus dokumen.";
            include '../views/dokumentasi.php';
        }
    }

    // Menampilkan semua dokumen
    public function viewDocuments() {
        $document_list = Document::getAll();  // Ambil semua dokumen dari database
        include '../views/view_documents.php';  // Tampilkan daftar dokumen
    }

    // Menampilkan daftar dokumen yang bisa dihapus (view_delete_document.php)
    public function viewDeleteDocuments() {
        $document_list = Document::getAll();  // Ambil semua dokumen
        include '../views/view_delete_document.php';  // Tampilkan daftar dokumen
    }
}
?>
