<?php
function authenticate() {
    session_start();
    if(!isset($_SESSION["user"])) {
        echo "You are not authenticated!";
        include __DIR__."/login.php";
        exit;
    } else {
        echo "You are authenticated!";
    }
}
?>