<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->insertBook(
    $_REQUEST["bookTitle"], 
    $_REQUEST["bookAuthor"], 
    $_REQUEST["bookGenre"],
    $_REQUEST["bookTotal"]
)) {
    header("Location: http://localhost:8000/bookmanagement.com");
} else {
    echo "Fail to insert book";
}
?>