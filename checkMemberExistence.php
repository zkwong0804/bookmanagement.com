<?php
    include __DIR__."/db.php";
    $db = new Db();
    error_log("memID: ".$_REQUEST["memID"]);
    if (isset($_REQUEST["memPass"])) {
        sendJson($db->checkMemberExistence_pass($_REQUEST["memID"], $_REQUEST["memPass"]));
    } else {
        sendJson($db->checkMemberExistence($_REQUEST["memID"]));
    }


    function sendJson($exist) {
        header("Content-Type: application/json");
        echo json_encode(["exist" => $exist]);
    }
?>