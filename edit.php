<?php
include "docs/classes.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    $oldSKU = $_POST["oldSKU"];
    $oldSKU = "'$oldSKU'";

    $editProduct = match($productType){
        'DVD' => DVD::getProduct($oldSKU),
        'Book' => Book::getProduct($oldSKU),
        'Furniture' => Furniture::getProduct($oldSKU),
    };
    
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