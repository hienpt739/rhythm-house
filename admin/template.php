<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');

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
            </ul>
            <a href="logout.php">log out</a>
            </div>
        </nav>
      <!-- main -->
      <div class="container-fluid mt-md-5">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-4 p-3">
            <h3 class="text-center">Orders of <?=$nameOfThisMonth?></h3>
            <form method="get" class="w-sm-75 w-50 mx-auto">
              <label for="month">select a month</label>
              <input id="month" name="month" value="<?=$m?>" class="form-control" type="number" min="1" max ="12">
              <button class="btn btn-primary mt-2" type="submit">View</button>
            </form>
          </div>
          <div class="col-md-8 p-3">
            <canvas id="myChart"></canvas>
          </div>
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
    
    <footer></footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
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
                    
                ],
                
                borderWidth: 5
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
  </script>


  </body>
</html>
