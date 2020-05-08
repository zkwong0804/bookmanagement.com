<?php
    include __DIR__."/db.php";
    $db = new Db();
    if ($db->insertLibrarian(
        $_REQUEST["newLibName"], $_REQUEST["newLibPass"])) {
            $db->close();
            header("Location: http://localhost:8000/");
            exit;
    } else {
        echo "Fail to insert new librarian";
        $db->close();
    }
?>