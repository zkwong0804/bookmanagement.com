<?php
include __DIR__."/db.php";
$db = new Db();
if ($db->renewMembership($_REQUEST["memID"])) {
    header("Location: http://10.0.24.13:6006/index.php");
} else {
    echo "Failed to renew membership";
}
?>