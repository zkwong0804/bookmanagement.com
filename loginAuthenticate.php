<?php
include __DIR__."/db.php";
// $user_id = $_REQUEST["userid"];
// $user_pass =  $_REQUEST["userpass"];

$db = new Db;
$db->getUser($_REQUEST["userid"], $_REQUEST["userpass"]);
    
?>