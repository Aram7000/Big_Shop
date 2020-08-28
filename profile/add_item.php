<?php

if (!isset($_POST["in"])) {
    echo "asd";
    // header("Location: ../profile");
}

include "../edb/functions.php";

$itemName = $_POST["in"];
$itemPrice = $_POST["ip"];
$itemType = $_POST["it"];
$itemCount = $_POST["ic"];
$itemImg = $_FILES["ii"];

$extension = pathinfo($itemImg['name'])['extension'];
$path = "../assets/item_assets/".$itemName.".".$extension;
$tmp_key = $itemImg["tmp_name"];

move_uploaded_file($tmp_key, $path);

$db = new EDB("../edb/databases/items.edb");
if (strtolower($itemType) == "արկղ") {
    $itemCount = 20;
    $itemType = "Արկղ";
} else if (strtolower($itemType) == "հատ") {
    $itemCount = 1;
    $itemType = "Հատ";
} else if (strtolower($itemType) == "բլոկ") {
    $itemCount = (int)$itemCount;
    $itemType = "Բլոկ";
} else {
    header("Location: index.php");
}


$table = [
    $itemName,
    ["price", (int)$itemPrice],
    ["type", $itemType],
    ["count", (int)$itemCount],
    ["img", "$itemName.$extension"],
];


$db->addinDB($table);

header("Location: index.php");

?>