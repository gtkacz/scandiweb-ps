<?php
include "db.php";

if(isset($_POST['but_delete'])){
  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){
      $sql = "delete from products where SKU = '$deleteid'";
      mysqli_query($db, $sql);
    }
    header('location: index.php');
  }
}
?>