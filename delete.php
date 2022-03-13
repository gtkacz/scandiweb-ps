<?php
include "docs/classes.php";

if(isset($_POST['but_delete'])){
  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){
      $separate = explode("+", $deleteid);
      $SKU = $separate[0];
      $SKU = "'$SKU'";
      $productType = $separate[1];

      $productDelete = match($productType){
          'DVD' => DVD::getProduct($SKU),
          'Book' => Book::getProduct($SKU),
          'Furniture' => Furniture::getProduct($SKU),
      };

      $productDelete->remove();
    }
  }
}
header('location: index');
?>