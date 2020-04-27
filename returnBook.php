<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->returnBook($_REQUEST["returnID"])) {
    header("Location: http://localhost:8000/bookmanagement.com");
} else {
    echo "Failed to return book";
}
?>