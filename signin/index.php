<?php
include "../edb/functions.php";

$cn = $_POST["cn"];
$id = $_POST["id"];

$db = new EDB("../edb/databases/accounts.edb", "undefined");
$dbContent = $db->formatAsObj()["content"];

session_start();
if (isset($dbContent[$id]) && $dbContent[$id]["name"] == $cn) {
    $_SESSION["cn"] = $cn;
    $_SESSION["id"] = $id;
    header("Location: ../profile");    
} else {
    $_SESSION["log_err"] = 1;
    header("Location: ../log");
}
