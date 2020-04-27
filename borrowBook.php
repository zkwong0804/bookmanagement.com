<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->borrowBook($_REQUEST["bookID"], $_REQUEST["memID"])) {
    header("Location: http://10.0.24.13:6006");
} else {
    echo "Failed to borrow book";
}
?>