<?php

include "../edb/functions.php";
$cn = $_POST["cn2"];
$pn = $_POST["pn"];

if (strlen($cn) < 1) {
    header("Location: ../log");
} else if (str_replace("x", "", $pn) != $pn) {
    header("Location: ../log");
} else {
    $pn = str_replace(")", "", $pn);
    
    $db = (new EDB("../edb/databases/request.edb"))->content;
    echo count($db);
    $table = [
        count($db),
        ["cn", $cn],
        ["pn", $pn],
    ];
    
    (new EDB("../edb/databases/request.edb"))->addinDB($table);
}
session_start();
$_SESSION["requested"] = 1;
header("Location: ../log"); 

?>