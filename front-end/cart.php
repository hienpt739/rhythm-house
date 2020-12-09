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
<!-- nav -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">RhythmHouse</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarcontent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders-detail.php">Orders_Detail</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="test.php">test </a>
            </li>
          </ul>
          <a href="logout.php">log out</a>
        </div>
      </nav>
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