<?php
    include __DIR__."/db.php";
    $db = new Db();
    sendJson($db->checkReturnExistence($_REQUEST["returnID"]));


    function sendJson($exist) {
        header("Content-Type: application/json");
        echo json_encode(["exist" => $exist]);
    }
?>