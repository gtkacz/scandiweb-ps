<?php
include "db.php";

$db = new Database();

$table = "products";

$SKU = $_POST["SKU"];
$Name = $_POST["Name"];
$Price = $_POST["Price"];
$productType = $_POST["productType"];

if($productType == "DVD"){
    $attr_value = $_POST["size"];
}
elseif($productType == "Book"){
    $attr_value = $_POST["weight"];
}
elseif($productType == "Furniture"){
    $height = $_POST["height"];
    $width = $_POST["width"];
    $length = $_POST["length"];

    $attr_value = "${height}x${width}x${length}";
}

$fields = array(
    "SKU" => $SKU,
    "Name" => $Name,
    "Price" => $Price,
    "productType" => $productType,
    "attr_value" => $attr_value
);

$query = $db->save($table, $fields);

if($query){
    header('location: index.php');
}

?>