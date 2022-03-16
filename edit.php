<?php
include "docs/classes.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    $oldSKU = $_POST["oldSKU"];
    $oldSKU = "'$oldSKU'";

    $editProduct = call_user_func([$productType, 'getProduct'], $oldSKU);
    
    $editProduct->SKU = $_POST["SKU"];
    $editProduct->Name = $_POST["Name"];
    $editProduct->Price = $_POST["Price"];
    $editProduct->productType = $productType;
    $editProduct->productAttribute = $_POST["productAttribute"];

    $editProduct->edit($oldSKU);

    header('location: index');
    exit;
}
?>