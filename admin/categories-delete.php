<?php 
  require_once('../database/config.php');
  require_once('../database/functions.php');
  if(!empty($_POST['id'])) {
    $id = $_POST['id'];
    // $sql = "DELETE FROM categories WHERE id='$id';";
    $sql = "UPDATE categories SET isDeleted=1 WHERE id='$id';";
    dbManipulation($sql);
  }