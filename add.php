<?php
include "db.php";

$SKU = $_POST["SKU"];
$Name = $_POST["Name"];
$Price = $_POST["SKU"];
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

$sql = "INSERT INTO products VALUES ('$SKU', '$Name','$Price','$productType','$attr_value')";

$query = $db->query($sql);

if($query){
    header('location: index.php');
}

?>