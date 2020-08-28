<?php

if (!isset($_POST["item"])) {
    header("Location: ../");
}

include "../edb/functions.php";

$i = $_POST["item"];

$db = new EDB("../edb/databases/items.edb");


$db->delete($db->content[$i][0]);