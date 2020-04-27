<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->returnBook($_REQUEST["returnID"])) {
    header("Location: http://10.0.24.13:6006");
} else {
    echo "Failed to return book";
}
?>