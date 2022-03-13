<?php
include "docs/classes.php";

try {
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
}
catch (\Throwable $t) {
  echo "caught!\n";

  echo $t->getMessage(), " at ", $t->getFile(), ":", $t->getLine(), "\n";
}

header('location: index');
?>