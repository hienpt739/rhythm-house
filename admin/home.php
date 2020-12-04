<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');

  // get and set data for success orders - total income 
  if(isset($_GET['startTime']) && !empty($_GET['startTime'])) {
    $startTime = $_GET['startTime'];
  } else {
    $lastMonth = date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
    $startTime = $lastMonth;
  }
  if(isset($_GET['endTime']) && !empty($_GET['endTime'])) {
    $endTime = $_GET['endTime'];
  } else {
    $endTime = date("Y-m-d");
  }
  $sql = "SELECT COUNT(id) as orders, SUM(total_money) as total FROM orders WHERE status=1 AND created_at BETWEEN '$startTime' AND '$endTime';";
  $result = dbSelectSingle($sql);
  if(!empty($result['total'])) {
    $totalMoneyOfSuccessOrders = $result['total'];
  } else {
    $totalMoneyOfSuccessOrders = 0;
  }
  
  $successOrders = $result['orders'];

  // set and get data for orders of month - chart
  $year = date("Y");
  
  if(isset($_GET['month']) && !empty($_GET['month'])) {
    $m = $_GET['month'];
  } else {
    $m = date("m");
  }

  $lastDayOfThisMonth = date("t", strtotime(date("Y-$m")));

  $nameOfThisMonth = date("F", strtotime(date("Y-$m-d")));

  $week0 =  date("$year-$m-01");
  $week1 =  date("$year-$m-07");
  $week1NextDay = date("$year-$m-08");

  $week2 =  date("$year-$m-14");
  $week2NextDay = date("$year-$m-15");
  
  $week3 =  date("$year-$m-21");
  $week3NextDay = date("$year-$m-22");
  $week4 =  date("$year-$m-$lastDayOfThisMonth"); // +- 3 days

  $sqlW1 = "SELECT id FROM orders WHERE created_at BETWEEN '$week0' AND '$week1'";
  $sqlW2 = "SELECT id FROM orders WHERE created_at BETWEEN '$week1NextDay' AND '$week2'";
  $sqlW3 = "SELECT id FROM orders WHERE created_at BETWEEN '$week2NextDay' AND '$week3'";
  $sqlW4 = "SELECT id FROM orders WHERE created_at BETWEEN '$week3NextDay' AND '$week4'";

  $ordersW1 = count(dbSelect($sqlW1));
  $ordersW2 = count(dbSelect($sqlW2));
  $ordersW3 = count(dbSelect($sqlW3));
  $ordersW4 = count(dbSelect($sqlW4));

  // get and set data for products/categorie -- doughnut chart

  $sql = "SELECT name FROM categories WHERE isDeleted=0";
  $result = dbSelect($sql);

  $countCate = count($result);

  $arrCateNameJs = "[";
  foreach($result as $row) {
    $cateName = $row['name'];
    $arrCateNameJs .= "'" . $cateName . "',";
  }
  $arrCateNameJs .= "]";

  $data = [];
  foreach($result as $row) {
    $cateName = $row['name'];
    $sql = "SELECT products.id FROM products INNER JOIN categories ON products.id_categories = categories.id WHERE categories.name='$cateName' AND products.isDeleted=0";
    $result = dbSelect($sql);
    array_push($data, count($result));
  }

  $arrCountProductJs = "[";
  foreach($data as $item) {
    $arrCountProductJs .= "'" . $item . "',";
  }
  $arrCountProductJs .= "]";
  
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Home page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/6b29bebedc.js" crossorigin="anonymous"></script>

    <!-- chartjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- if session isn't set, required login-->
    <?php if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">RhythmHouse</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcontent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
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
                <li class="nav-item">
                  <a class="nav-link" href="orders-detail.php">Orders_Detail</a>
                </li>
            </ul>
            <a href="logout.php">log out</a>
            </div>
        </nav>
        
      <!-- main -->
      <div class="container-fluid mt-md-5">
        <div class="row justify-content-center align-items-center">
          <!-- view income -->
          <div class="col-md-4 p-lg-5 mt-3">
            <h3 class="text-center">Success Orders</h3>
            <form method="get" id="formCheckIncome">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="startTime">Start time</label>
                  <input value="<?=$startTime?>" name="startTime" type="date" class="form-control" id="startTime">
                </div>
                <div class="form-group col-md-6">
                  <label for="endTime">End Time</label>
                  <input value="<?=$endTime?>" name="endTime" type="date" class="form-control" id="endTime">
                </div>
              </div>
              <small id="textTimeHelp" class="form-text text-danger"></small>
              <button class="btn btn-primary mt-2" type="submit">View</button>
            </form>
          </div>
          <div class="col-md-8 p-lg-5 mt-3">
            <div class="d-flex justify-content-center align-items-center flex-column flex-sm-row">
              <div class="text-center p-md-3">
                <p class="text-success"><i class="fas fa-check-circle"></i> Success Orders</p>
                <h3 class="display-4"><?=$successOrders?></h3>
              </div>
              <div class="text-center p-md-3">
                <p class="text-success"><i class="fas fa-dollar-sign"></i> Total</p>
                <h3 class="display-4">$<?=$totalMoneyOfSuccessOrders?></h3>
              </div>
            </div>
          </div>

          <!-- orders of month -- line chart -->
          <div class="col-md-4 p-lg-5 mt-3">
            <h3 class="text-center">Orders of <?=$nameOfThisMonth?></h3>
            <form method="get" class="w-50 mx-auto">
              <label for="month">select a month</label>
              <input id="month" name="month" value="<?=$m?>" class="form-control" type="number" min="1" max ="12">
              <button class="btn btn-primary mt-2" type="submit">View</button>
            </form>
          </div>
          <div class="col-md-8 p-lg-5 mt-3 p-md-3">
            <canvas id="ordersOfMonth"></canvas>
          </div>
          
          <!-- products/categorie -- pie chart -->
          <div class="col-md-4 p-lg-5 mt-3">
            <h3 class="text-center">Products/Category</h3>
          </div>
          <div class="col-md-8 p-lg-5 mt-3">
            <canvas id="productsOfCategories"></canvas>
          </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <script>

    // check value of times
    $('#formCheckIncome').submit(function() {
      if($("#startTime").val() == '' || $('#endTime').val() == '') {
        $('#textTimeHelp').text('Start time or end time is empty.');
        return false;
      } else {
        if(new Date($("#startTime").val()) >  new Date($("#endTime").val())) {
          $('#textTimeHelp').text('Start time must smaller than end time.');
          return false;
        } else {
          return true;
        }
      }
    });



    var ordersOfMonth = document.getElementById('ordersOfMonth').getContext('2d');
    var productsOfCategories = document.getElementById('productsOfCategories').getContext('2d');

    // chart: orders of month
    var myChart = new Chart(ordersOfMonth, {
        type: 'line',
        data: {
            labels: ['<?=$week0?>', '<?=$week1?>', '<?=$week2?>', '<?=$week3?>', '<?=$week4?>'],
            datasets: [{
                label: 'Orders of <?=$nameOfThisMonth?>',
                data: [0, <?=$ordersW1?>, <?=$ordersW2?>, <?=$ordersW3?>, <?=$ordersW4?>],
                
                backgroundColor: [
                    'transparent',  
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)', 
                    'rgba(37, 155, 137, 1)',                    
                ],
                borderWidth: 3
            },
              
          ]
        },
        
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


    // chart: products/category
    var numColor = <?=$countCate?>;
    var bgColors = [];
    for(i = 0; i < numColor; i++) {
      $color = 'rgb('+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+', '+Math.floor(Math.random() * 256)+')';
      bgColors.push($color);
    }
    
    var myChart = new Chart(productsOfCategories, {
        type: 'pie',
        data: {
            labels: <?=$arrCateNameJs?>,
            datasets: [{
                data: <?=$arrCountProductJs?>,
                backgroundColor: bgColors
            },
              
          ]
        },
      

    });

  </script>


  </body>
</html>
