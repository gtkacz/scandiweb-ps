<?php
include "docs/classes.php";

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

    $newProduct->SKU = $_POST["SKU"];
    $newProduct->Name = $_POST["Name"];
    $newProduct->Price = $_POST["Price"];
    $newProduct->productType = $productType;
    $newProduct->productAttribute = $productAttribute;

    $newProduct->create();

    header('location: index.php?status=success');
    exit;
}
?>