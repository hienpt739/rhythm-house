<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Orders Detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/6b29bebedc.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- if session isn't set, required login-->
    <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true): ?>
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
              <a class="nav-link" href="categories.php">Categories</a>
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
            <li class="nav-item active">
              <a class="nav-link" href="orders-detail.php">Orders_Detail</a>
            </li>
          </ul>
          <a href="logout.php">log out</a>
        </div>
      </nav>
      <!-- main -->
      <div class="container-fluid mt-md-5">
        
        <h1 class="text-center">Orders Detail List</h1>
        <div class="mb-3">
          <form class="col-md-3 mx-auto mt-3">
            <input class="form-control" id="searchOrderId" type="text" placeholder="filter id of orders">
            
          </form>
        </div>

        <!-- 
          
        CREATE TABLE orders_detail (
          id_Orders INT,
          id_Products INT,
          price DECIMAL(15,2),
          number INT,
          total_money DECIMAL(15,2),
          CONSTRAINT PK_orders_detail PRIMARY KEY (id_Orders, id_Products),
          CONSTRAINT FK_id_Orders FOREIGN KEY (id_Orders) REFERENCES orders(id),
          CONSTRAINT FK_id_Products FOREIGN KEY (id_Products) REFERENCES products(id)
        );	

         -->
        <div class="table-responsive">
          <table class="table table-hover mx-auto shadow bg-white">
            <thead class="thead-dark">
              <tr>
                <th></th>
                <th scope="col">Order Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Number</th>
                <th scope="col">Total Money</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              // pagination + display table
                if(isset($_GET['page'])) {
                  $page = $_GET['page'];
                } else {
                  $page = 1;
                }
                $recordPerPage = 8;         
                $offset = ($page-1) * $recordPerPage;
                $sql = "SELECT id_Orders FROM orders_detail";
                $result = dbSelect($sql);
                $totalRecord = count($result);
                $totalPage = ceil($totalRecord / $recordPerPage);
                $sql = "SELECT orders_detail.id_Orders, products.name, orders_detail.price, orders_detail.number, orders_detail.total_money FROM orders_detail	INNER JOIN products ON orders_detail.id_Products = products.id LIMIT $offset, $recordPerPage;";
                $result = dbSelect($sql);
                $numericOrder = ($page-1) * $recordPerPage;
                foreach($result as $row) {
                  $numericOrder++;
                  $orderId = $row['id_Orders'];
                  $productName = $row['name'];
                  $price = $row['price'];
                  $number = $row['number'];
                  $total_money = $row['total_money'];
                  echo "
                    <tr class='tr'>
                      <td>$numericOrder</td>
                      <td class='orderId'>$orderId</td>
                      <td>$productName</td>
                      <td>$price</td>
                      <td>$number</td>
                      <td>$total_money</td>
                    </tr>
                  ";
                }
              ?> 
            </tbody>
          </table>  
        </div>
        
        <!-- pagination button -->
        <nav aria-label="Page navigation" class="mt-3">
          <ul class="pagination">
            <?php if($page <= 1) : ?>
            <?php else :?>  
            <li class="page-item">
              <a class="page-link" href="products.php?page=<?=$page - 1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <?php endif;?>  
            <?php 
              for($i = 1; $i <= $totalPage; $i++) {
                if($i == $page) {
                  $active = ' active';
                } else {
                  $active = '';
                }
                echo '<li class="page-item '.$active.'"><a class="page-link" href="products.php?page='.$i.'">'.$i.'</a></li>';
              }
            ?>     
            
            <?php if($page >= $totalPage) : ?>
            <?php else :?> 
            <li class="page-item">
              <a class="page-link" href="products.php?page=<?=$page + 1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
            <?php endif;?> 
          </ul>
        </nav>
      </div>
    <?php else: ?>
      <div id="content-no-session" class="d-flex justify-content-center align-items-center">
        <div>
          <h1 class="text-center display-4">Please login to see this page.</h1>
          <h3 class="text-center"><a href="login.php">Login</a><h3>
        </div>
      </div>

    <?php endif; ?>    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      //filter id of order
      $('#searchOrderId').keyup(function() {
        const trs = document.querySelectorAll('.tr');
        const val = $('#searchOrderId').val().toLowerCase();
        for(i = 0; i < trs.length; i++) {
          trs[i].style.display = 'none';
          if(trs[i].querySelector('.orderId').innerHTML.toLowerCase().indexOf(val) > -1) {
            trs[i].style.display = 'table-row';
          }
        }
      });
    </script>
  </body>
</html>
