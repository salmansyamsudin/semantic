<?php
require_once '../models/JenisDoc.php';

class JenisDocController {
    // Menghapus jenis dokumen
    public function deleteJenisDoc($jenis_doc_id) {
        JenisDoc::delete($jenis_doc_id);
        header("Location: view_delete_jenis_doc.php");
    }
}
?>
