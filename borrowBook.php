<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->borrowBook($_REQUEST["bookID"], $_REQUEST["memID"])) {
    header("Location: http://localhost:8000/bookmanagement.com");
} else {
    echo "Failed to borrow book";
}
?>