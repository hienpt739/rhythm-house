<?php 

  session_start();
  if(isset($_SESSION['isSignin'])) {
    $isSignin = $_SESSION['isSignin'];
    if(!empty($_GET)) {
      if(!empty($_GET['logout'])) {
        session_unset();
        session_destroy();
        $isSignin = false;
      }
    }
  } else {
    $isSignin = false;
  }
  
  
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- font awesome -->
  <script src="https://kit.fontawesome.com/6b29bebedc.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="home.php"><img src="images/favicon-32x32.png" alt="icon"> RhythmHouse</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="store.php">MUSIC STORE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="liveshow.php">LIVE SHOWS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">ABOUT US</a>
          </li>
        </ul>
        
        <a class="mr-3" href="cart.php" id="cartLink"><i class="fas fa-shopping-cart text-primary"></i><span>1</span></a>

        <?php if(!$isSignin) : ?> 
        <a class="ml-3 btn btn-sm btn-outline-primary mr-10" href="signin.php">sign in</a>
        <?php else : ?>
        <div class="dropdown d-inline-block mr-10" id="dropdown-signin">
          <i data-toggle="dropdown" class="fas fa-user dropdown-toggle text-primary"></i>
          <div class="dropdown-menu" id="dropdown-menu-signin">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Orders History</a>
            <a class="dropdown-item" href="home.php?logout=yes">Log out</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </nav>


    <!-- section 1: link to music store / live shows -->
    <div class="container-fluid" id="section1">
      <div id="section1-subContainer" class="mx-auto d-flex justify-content-center align-items-center">
        <div class="text-center text-white">
          <h1 class="display-4">NEW ALBUM OUT NOW</h1>
          <p class="mx-auto w-75 lead d-none d-md-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo sint quam saepe aliquid quia possimus. Explicabo cumque eaque ipsam accusantium</p>
          <a class="btn btn-md-lg btn-primary" href="#">Music Store</a>
          <a class="btn btn-md-lg btn-primary" href="#">Live Show</a>
        </div>
      </div>
    </div>

    <!-- section 2: lastest albums/ single -->
    <div class="container mt-3">
      <h1>Lastest Albums/ Single<h1>
      <div class="row">
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh1.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh2.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
        </div>
      </div>
    </div>

    <!-- section 3: live show link -->
    <div id="section3" class="container-fluid mt-3">
      <div id="section3-subContainer" class="w-75 mx-auto d-flex justify-content-center align-items-center">
        <div class="text-center">
          <h1>LIVE SHOW</h1>
          <h3>Music Live Show starts now</h3>
          <a class="btn btn-md-lg btn-primary" href="#">Live Shows</a>
          <a class="btn btn-md-lg btn-primary" href="#">About Us</a>
        </div>
      </div>
    </div>

    <!-- section 4: best seller albums-->
    <div class="container mt-3">
      <h1>Best Sellers</h1>
      <div class="row">
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh1.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh2.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh1.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh2.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
        <div class="col-6 col-md-3 mt-3 mx-auto">
          <img class="img-fluid rounded" src="images/anh3.jpg">
          <h5>Main Stage</h5>
          <h6>Frau Power</h6>
          <h6>$7.99</h6>
          <a class="btn btn-sm btn-primary" href="#">add to cart</a>
        </div>
      </div>
    </div>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>