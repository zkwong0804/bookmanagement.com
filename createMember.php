<?php
    include __DIR__."/db.php";
    $db = new Db();
    if ($db->insertMember(
        $_REQUEST["newMemName"], $_REQUEST["newMemPass"])) {
            $db->close();
            header("Location: http://localhost:8000/");
            exit;
    } else {
        echo "Fail to insert new member";
        $db->close();
    }
?>