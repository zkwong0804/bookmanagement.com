<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->extendExpire($_REQUEST["returnID"])) {
    header("Location: http://localhost:8000/");
} else {
    echo "Failed to return book";
}
?>