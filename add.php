<?php
include "db.php";

$SKU = $_POST["SKU"];
$Name = $_POST["Name"];
$Price = $_POST["SKU"];
$attr_name = $_POST["attr_name"];
$attr_value = $_POST["attr_value"];

$sql = "INSERT INTO products VALUES ('$SKU', '$Name','$Price','$attr_name','$attr_value')";

$query = $db->query($sql);

if($query){
    header('location: index.php');
}

?>