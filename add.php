<?php
include "db.php";

if(isset($_POST["SKU"], $_POST["Name"], $_POST["Price"], $_POST["productType"])){
    $productType = $_POST["productType"];

    if($productType == "DVD"){
        $productAttribute = $_POST["size"];
        $newProduct = new DVD;
    }
    elseif($productType == "Book"){
        $productAttribute = $_POST["weight"];
        $newProduct = new Book;
    }
    elseif($productType == "Furniture"){
        $height = $_POST["height"];
        $width = $_POST["width"];
        $length = $_POST["length"];
    
        $productAttribute = "${height}x${width}x${length}";
        $newProduct = new Furniture;
    }

    $newProduct->SKU = $_POST["SKU"];
    $newProduct->Name = $_POST["Name"];
    $newProduct->Price = $_POST["Price"];
    $newProduct->productType = $productType;
    $newProduct->productAttribute = $productAttribute;

    $newProduct->create();
}
$query = $db->save($table, $fields);

if($query){
    header('location: index.php');
}

?>