<?php
require_once('../database/config.php');
  require_once('../database/functions.php');
// if(isset($_COOKIE)) {
//   if(!empty($_COOKIE['']))
// }
// echo $_COOKIE['myCookie'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $productsId = array_slice($_COOKIE, 1);
    foreach($productsId as $key=>$id) {
      $sql = "SELECT name, price FROM products WHERE id='$id';";
      $result = dbSelectSingle($sql);
      $name = $result['name'];
      $pirce = $result['price'];
      echo "<p>$name -- $pirce <button onclick='remove(event,\"$key\")'>remove</button></p>";
      
    }
  ?>
  <script>
    console.log(document.cookie);
    function remove(e, cookieName){
      e.target.parentElement.remove();
      document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      console.log(document.cookie);
    }
    
  </script>
</body>
</html>