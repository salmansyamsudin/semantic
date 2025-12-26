<?php
require_once '../models/Keyword.php';

class KeywordController {
    // Menghapus kata kunci
    public function deleteKeyword($keyword_id) {
        Keyword::delete($keyword_id);
        header("Location: view_delete_keyword.php");
    }
}
?>
