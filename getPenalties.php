<?php
include __DIR__."/db.php";
$db = new Db();
sendJson($db->getPenalties($_REQUEST["memID"]));



function sendJson($result) {
    header("Content-Type: application/json");
    echo json_encode(["result" => $result]);
}
?>