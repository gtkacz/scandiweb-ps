<?php
include "db.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    switch($productType){
        case "DVD":
            $productAttribute = $_POST["size"];
            $newProduct = new DVD;
            break;

        case "Book":
            $productAttribute = $_POST["weight"];
            $newProduct = new Book;
            break;

        case "Furniture":
            $height = $_POST["height"];
            $width = $_POST["width"];
            $length = $_POST["length"];

            $productAttribute = "${height}x${width}x${length}";
            $newProduct = new Furniture;
            break;
    }

    $newProduct->setSKU($_POST["SKU"]);
    $newProduct->setName($_POST["Name"]);
    $newProduct->setPrice($_POST["Price"]);
    $newProduct->setProductType($productType);
    $newProduct->setProductAttribute($productAttribute);

    $newProduct->create();

    header('location: index.php?status=success');
    exit;
}
?>