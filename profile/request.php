<?php

if (!isset($_POST["us"])) {
    header("Location: ../");
}
include "../edb/functions.php";
$us = $_POST["us"];
$req = $_POST["req"];

$rdb = new EDB("../edb/databases/request.edb");
$rdbContent = $rdb->formatAsObj()["content"];
$adb = new EDB("../edb/databases/accounts.edb", "undefined");
if (isset($rdbContent[$us])) {
    if ($req) {
        $newID = count($adb->content);
        $newID = str_split($newID);
        while (count($newID) < 10) {
            array_unshift($newID, "0");
        }
        $newID = join("", $newID);
    
        $table = [
            $newID,
            ["name", $rdbContent[$us]["cn"]],
            ["admin", 0],
            ["phone number", $rdbContent[$us]["pn"]],
        ];
        $adb->addinDB($table);
    }
    $rdb->delete($us);
}

?>