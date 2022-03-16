<?php
include "docs/classes.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    $newProduct = new $productType;

    $newProduct->SKU = $_POST["SKU"];
    $newProduct->Name = $_POST["Name"];
    $newProduct->Price = $_POST["Price"];
    $newProduct->productType = $productType;
    $newProduct->setAttribute($_POST);

    $newProduct->create();

    header('location: index');
    exit;
}
?>