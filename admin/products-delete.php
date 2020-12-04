<?php 
  require_once('../database/config.php');
  require_once('../database/functions.php');
  if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "UPDATE products SET isDeleted=1 WHERE id='$id';";
    dbManipulation($sql);
  }