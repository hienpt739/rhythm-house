<?php 

  require_once('../database/config.php');
  require_once('../database/functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Categories</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap, CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/6b29bebedc.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- if session isn't set, required login-->
    
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
              <a class="nav-link position-relative" href="cart.php">Cart <span id="numProdOfCart" class="bg-danger text-center rounded" style="position: absolute; display: inline-block; width: 20px; height:20px; top: 0; right: -5px;"></span></a>
            </li>
          </ul>
          <a href="logout.php">log out</a>
        </div>
      </nav>
      <!-- main -->
      <div class="container mt-md-5">
        <h1 class="text-center">Categories List</h1>
        <div class="col-lg-8 mx-auto mb-2 px-0">
          <a class="btn btn-primary" href="categories-add.php">Add item</a>
        </div>
        <div class="table-responsive">
          <table class="table table-hover col-lg-8 mx-auto shadow bg-white">
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $sql = "SELECT * FROM products WHERE isDeleted=0;";
                $result = dbSelect($sql);
                $numericOrder = 0;
                foreach($result as $row) {
                  $numericOrder++;
                  $id = $row['id'];
                  $name = $row['name'];
                  echo "
                    <tr>
                      <td>$numericOrder</td>
                      <td>$id</td>
                      <td>$name</td>
                      <td>
                        <button class='btn btn-sm btn-success' onclick='addToCart($id)'>add to cart</button>
                        
                      </td>
                    </tr>
                  ";
                }
              ?> 
            </tbody>
          </table>
        </div>
      </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    $count = 0;
    $('#numProdOfCart').text($count);
    $('#numProdOfCart').hide();
    
    function addToCart(id) {
      $count++;
      $('#numProdOfCart').text($count);
      $('#numProdOfCart').show();
      setCookie(`product${id}`, id, 1);
      console.log(document.cookie);
    }

    
    </script>
  </body>
</html>
