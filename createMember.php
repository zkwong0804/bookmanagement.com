<?php
    include __DIR__."/db.php";
    $db = new Db();
    if ($db->insertMember(
        $_REQUEST["newMemName"], $_REQUEST["newMemPass"])) {
            $db->close();
            header("Location: http://10.0.24.13:6006/index.php");
            exit;
    } else {
        echo "Fail to insert new member";
        $db->close();
    }
?>