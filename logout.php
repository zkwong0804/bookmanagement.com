<?php
session_start();
unset($_SESSION["user"]);
header("Location: http://10.0.24.13:6006/login.php");
?>