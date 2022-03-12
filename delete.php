<?php
include "docs/classes.php";

if(isset($_POST['but_delete'])){
  if(isset($_POST['delete'])){
    $where = array();
    echo '<pre>'; print_r($_POST['row']); echo '</pre>';

    foreach($_POST['delete'] as $deleteid){
      $where[] = $deleteid;
      echo $deleteid;
    }

    // echo '<pre>'; print_r($where); echo '</pre>';
    $delete = $db->delete($table, $where);
  }
}
header('location: index');
?>