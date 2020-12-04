<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');
  $id = $categoryName = $nameErr = $action ='';
  if(!empty($_GET)) {
    if(!empty($_GET['id'])) {
      $action = 'Edit this category';
      $id = $_GET['id'];
      $sql = "SELECT * FROM categories WHERE id='$id';";
      $result = dbSelectSingle($sql);
      $categoryName = htmlspecialchars($result['name']);
      if(!empty($_POST['id']) && !empty($_POST['categoryName'])) {
        $id = $_POST['id'];
        $categoryName = str_replace("'", "\'", $_POST['categoryName']);
        $sql = "UPDATE categories SET name = '$categoryName' WHERE id='$id';";
        dbManipulation($sql);
        header('Location: categories.php');
      }
    }
  } else {
    $action = 'Add a category';
    if(!empty($_POST['categoryName'])) {
      $categoryName = str_replace("'", "\'", $_POST['categoryName']);
      $sqlCheckExists = "SELECT * FROM categories WHERE name = '$categoryName';";
      $resultCheckExists = dbSelect($sqlCheckExists);
      if(count($resultCheckExists) > 0) {
        $nameErr = "This name already exists";
      } else {
        $nameErr = '';
        $sql = "INSERT INTO categories (name) VALUES ('$categoryName');";
        dbManipulation($sql);
        header('Location: categories.php');
      }
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Add Categories</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <!-- if session isn't set requied login-->
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
            <li class="nav-item">
              <a class="nav-link" href="orders-detail.php">Orders_Detail</a>
            </li>
          </ul>
          <a href="logout.php">log out</a>
        </div>
      </nav>
      <!-- main -->
      <div class="container">
        <h1 class="text-center mt-md-5"><?=$action?></h1>
        <div class="bg-white col-md-10 col-lg-6 mx-auto rounded p-3">
          <form method="post">
            <small id="nameHelp" class="form-text text-danger"><?=$nameErr?></small>
            <div class="form-group d-none">
              <label for="id">Category Id</label>
              <input name="id" value="<?=$id?>" type="number" class="form-control">
            </div>
            <div class="form-group">
              <label for="categoryName">Category Name</label>
              <input name="categoryName" value="<?=$categoryName?>" type="text" class="form-control" id="categoryName">
              <small id="categoryNameHelp" class="form-text text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form> 
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('form').submit(function() {
          if($('#categoryName').val() === '') {
            $('#categoryNameHelp').text('empty!');
            return false;
          } else {
            return true;
          }
        });
      });
    </script>
  </body>
</html>
