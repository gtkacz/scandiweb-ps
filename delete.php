<?php
include "docs/classes.php";

if(isset($_POST['but_delete'])){
  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){
      echo '<pre>'; print_r($_POST['deleteType']); echo '</pre>';
      $productType = $_POST["deleteType"];
      echo $productType;
      $productDelete = match($productType){
          'DVD' => DVD::getProduct($_POST['oldSKU']),
          'Book' => Book::getProduct($_POST['oldSKU']),
          'Furniture' => Furniture::getProduct($_POST['oldSKU']),
      };

      $productDelete->remove();
    }
  }
}
header('location: index');
?>