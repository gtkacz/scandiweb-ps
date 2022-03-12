<?php
include "db.php";

if(isset($_POST['but_delete'])){
  if(isset($_POST['delete'])){
    $db = new Database();
    $table = "products";
    $where = array();

    foreach($_POST['delete'] as $deleteid){
      $where[] = $deleteid;
    }

    $delete = $db->delete($table, $where);
  }
}
header('location: index.php');
?>