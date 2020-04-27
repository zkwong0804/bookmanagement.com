<?php
    include __DIR__."/db.php";
    $db = new Db();
    if ($db->insertLibrarian(
        $_REQUEST["newLibName"], $_REQUEST["newLibPass"])) {
            $db->close();
            header("Location: http://10.0.24.13:6006/index.php");
            exit;
    } else {
        echo "Fail to insert new librarian";
        $db->close();
    }
?>