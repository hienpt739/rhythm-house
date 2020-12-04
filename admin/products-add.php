<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');

  $productId = $productName = $categoryId = $number = $price = $imageLink = $author = $performance = $musicType = $releaseYear = $description = $action = '';

  date_default_timezone_set("Asia/Ho_Chi_Minh");
  $created_at = $update_at = date("Y/m/d h:i:sa");
  
  if(!empty($_GET)) {
    if(!empty($_GET['id'])) {
      $action = 'Edit this product';
      $productId = $_GET['id'];
      $sql = "SELECT * FROM products WHERE id='$productId';";
      $result = dbSelectSingle($sql);
      $productName = htmlspecialchars($result['name']);
      $categoryId = $result['id_categories'];
      $number = $result['number'];
      $price = $result['price'];
      $imageLink = $result['thumnail_link'];
      $author = htmlspecialchars($result['author']);
      $performance = $result['performance'];
      $musicType = htmlspecialchars($result['music_type']);
      $releaseYear = $result['release_year'];
      $description = htmlspecialchars($result['desciption']);
      if(!empty($_POST)) {
        if(!empty($_POST['productName'])) {
          $productName = str_replace("'", "\'", $_POST['productName']);
        }
        if(!empty($_POST['categoryId'])) {
          $categoryId = $_POST['categoryId'];
        }
        if(!empty($_POST['number'])) {
          $number = $_POST['number'];
        }
        if(!empty($_POST['price'])) {
          $price = $_POST['price'];
        }
        if(!empty($_POST['imageLink'])) {
          $imageLink = $_POST['imageLink'];
        }
        if(!empty($_POST['author'])) {
          $author = str_replace("'", "\'", $_POST['author']);
        }
        if(!empty($_POST['performance'])) {
          $performance = $_POST['performance'];
        }
        if(!empty($_POST['musicType'])) {
          $musicType = str_replace("'", "\'", $_POST['musicType']);
        }
        if(!empty($_POST['releaseYear'])) {
          $releaseYear = $_POST['releaseYear'];
        }
        if(!empty($_POST['description'])) {
          $description = str_replace("'", "\'", $_POST['description']);
        }
        $sql = "UPDATE products SET id_categories='$categoryId', name='$productName', number='$number', price='$price', thumnail_link='$imageLink', author='$author', performance='$performance', music_type='$musicType', desciption='$description', release_year='$releaseYear', updated_at='$update_at' WHERE id='$productId'";
        dbManipulation($sql);
        header('Location: products.php');
      }
    }
  } else {
    $action = 'Add a product';
    if(!empty($_POST)) {
      if(!empty($_POST['productName'])) {
        $productName = str_replace("'", "\'", $_POST['productName']);
      }
      if(!empty($_POST['categoryId'])) {
        $categoryId = $_POST['categoryId'];
      }
      if(!empty($_POST['number'])) {
        $number = $_POST['number'];
      }
      if(!empty($_POST['price'])) {
        $price = $_POST['price'];
      }
      if(!empty($_POST['imageLink'])) {
        $imageLink = $_POST['imageLink'];
      }
      if(!empty($_POST['author'])) {
        $author = str_replace("'", "\'", $_POST['author']);
      }
      if(!empty($_POST['performance'])) {
        $performance = $_POST['performance'];
      }
      if(!empty($_POST['musicType'])) {
        $musicType = str_replace("'", "\'", $_POST['musicType']);
      }
      if(!empty($_POST['releaseYear'])) {
        $releaseYear = $_POST['releaseYear'];
      }
      if(!empty($_POST['description'])) {
        $description = str_replace("'", "\'", $_POST['description']);
      }

      $sql = "INSERT INTO products (id_categories, name, number, price, thumnail_link, author, performance, music_type, desciption, release_year, created_at, updated_at) 
      VALUES ('$categoryId', '$productName', '$number', '$price', '$imageLink', '$author', '$performance', '$musicType', '$description', '$releaseYear', '$created_at', '$update_at');";
      dbManipulation($sql);
      header('Location: products.php');
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Add Products</title>
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
            <!-- id -->
            <div class="form-group d-none">
              <label for="productId">Product Id</label>
              <input name="productId" value="<?=$productId?>" type="number" class="form-control">
            </div>
            <!-- name -->
            <div class="form-group">
              <label for="productName">Product Name</label>
              <input name="productName" value="<?=$productName?>" type="text" class="form-control" id="productName">
              <small id="productNameHelp" class="form-text text-danger"></small>
            </div>
            <!-- categories -->
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="categoryId">Category</label>
              </div>
              <select name="categoryId" class="custom-select" id="categoryId">
                <option value="" selected>Choose an option...</option>
                <?php 
                  $sql = "SELECT * FROM categories;";
                  $result = dbSelect($sql);
                  foreach($result as $row) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $check = $categoryId == $id ? 'selected' : '';
                    echo "<option $check value='$id'>$name</option>";
                  }
                ?>
              </select>
            </div>
            <small id="categoryIdHelp" class="form-text text-danger mb-3"></small>
            <!-- number, price -->
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="number">Number of products</label>
                <input id="number" name="number" value="<?=$number?>" type="number" class="form-control">
                <small id="numberHelp" class="form-text text-danger"></small>
              </div>    
              <div class="form-group col-md-6">
                <label for="price">Price(unit)</label>
                <input id="price" name="price" value="<?=$price?>" type="number" min="0" step="0.01" class="form-control">
                <small id="priceHelp" class="form-text text-danger"></small>
              </div>
            </div>
            <!-- link -->
            <div class="form-group">
              <label for="imageLink">Image Link</label>
              <input name="imageLink" value="<?=$imageLink?>" type="text" class="form-control" id="imageLink">
            </div>      
            <!-- author -->
            <div class="form-group">
              <label for="author">Author</label>
              <input name="author" value="<?=$author?>" type="text" class="form-control" id="author">
            </div>        
            <!-- performance -->
            <div class="form-group">
              <label for="performance">Performance</label>
              <input name="performance" value="<?=$performance?>" type="text" class="form-control" id="performance">
            </div>       
            <!-- music_type -->
            <div class="form-group">
              <label for="musicType">Type</label>
              <input name="musicType" value="<?=$musicType?>" type="text" class="form-control" id="musicType">
            </div> 
            <!-- release_year -->
            <div class="form-group">
              <label for="releaseYear">Release Year</label>
              <input name="releaseYear" value="<?=$releaseYear?>" type="number" class="form-control">
            </div>           
            <!-- desciption -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" id="description" rows="5"><?=$description?></textarea>
            </div>       
            <!-- save -->
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
        $('#productName').change(function() {
          if($('#productName').val() == '') {
            $('#productNameHelp').text('Product Name is required!');
          } else {
            $('#productNameHelp').empty();
          }
        });
        $('#categoryId').change(function() {
          if($('#categoryId').val() == '') {
            $('#categoryIdHelp').text('Category is required!');
          } else {
            $('#categoryIdHelp').empty();
          }
        });
        $('#number').change(function() {
          if($('#number').val() == '') {
            $('#numberHelp').text('Number is required!');
          } else {
            $('#numberHelp').empty();
          }
        });
        $('#categoryId').change(function() {
          if($('#categoryId').val() == '') {
            $('#categoryIdHelp').text('Category is required!');
          } else {
            $('#categoryIdHelp').empty();
          }
        });

        $('#price').change(function() {
          if($('#price').val() == '') {
            $('#priceHelp').text('Price is required!');
          } else {
            $('#priceHelp').empty();
          }
        });

        $('form').submit(function() {
          if($('#productName').val() == '' || $('#categoryId').val() == '' || $('#number').val() == '' || $('#price').val() == '') {
            if($('#productName').val() == '') {
              $('#productNameHelp').text('Product Name is required!');
            } 
            if($('#categoryId').val() == '') {
              $('#categoryIdHelp').text('Category is required!');
            }

            if($('#number').val() == '') {
              $('#numberHelp').text('Number is required!');
            }
            if($('#price').val() == '') {
              $('#priceHelp').text('Price is required!');
            }
            return false;
          } else {
            return true;
          }
        });
      });
    </script>
  </body>
</html>
