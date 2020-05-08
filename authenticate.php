<?php
function authenticate() {
    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location: http://localhost:8000/login.php");
    }
}

function isAuthenticated() {
    if(isset($_SESSION["user"])) return true;
    else return false;
}
?>