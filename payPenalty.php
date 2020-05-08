<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->payPenalties($_REQUEST["penalties"])) {
    header("Location: http://localhost:8000");
} else {
    echo "Failed to pay penalties";
}
?>