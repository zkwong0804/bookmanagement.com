<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->renewMembership($_REQUEST["memID"])) {
    header("Location: http://localhost:8000/bookmanagement.com");
} else {
    echo "Failed to renew membership";
}
?>