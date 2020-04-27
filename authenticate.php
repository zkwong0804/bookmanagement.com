<?php
function authenticate() {
    session_start();
    if(!isset($_SESSION["user"])) {
        echo "You are not authenticated!";
        echo "<a href=\"http://10.0.24.13:6006/login.php\">"
        ."Click here to login</a>";
        exit;
    } else {
        echo "You are authenticated!";
    }
}

function isAuthenticated() {
    if(isset($_SESSION["user"])) return true;
    else return false;
}
?>