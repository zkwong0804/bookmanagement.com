<?php
include __DIR__."/db.php";
$user_id = $_REQUEST["userid"];
$user_pass =  $_REQUEST["userpass"];

$db = new Db;
if ($db->userExist($user_id, $user_pass)) {
    $login_user = $db->getUser($user_id);
    if (isset($login_user)) {
        session_start();
        $_SESSION["user"] = $login_user;
        $db->close();
        header("Location: http://localhost:8000");
        exit;
    } else {
        echo "Failed to find user ".$user_id;
    }
} else {
    echo "Login failed!";
    include __DIR__."/login.php";
}

$db->close();
    
?>