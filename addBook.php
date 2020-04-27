<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->insertBook(
    $_REQUEST["bookTitle"], 
    $_REQUEST["bookAuthor"], 
    $_REQUEST["bookGenre"],
    $_REQUEST["bookTotal"]
)) {
    header("Location: http://10.0.24.13:6006");
} else {
    echo "Fail to insert book";
}
?>