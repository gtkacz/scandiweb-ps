<?php
include "docs/classes.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    $editProduct = match($productType){
        'DVD' => DVD::getProduct($_POST['oldSKU']),
        'Book' => Book::getProduct($_POST['oldSKU']),
        'Furniture' => Furniture::getProduct($_POST['oldSKU']),
    };

    $editProduct->SKU = $_POST["SKU"];
    $editProduct->Name = $_POST["Name"];
    $editProduct->Price = $_POST["Price"];
    $editProduct->productType = $productType;
    $editProduct->productAttribute = $_POST["productAttribute"];

    $editProduct->edit($_POST['oldSKU']);

    header('location: index');
    exit;
}
?>