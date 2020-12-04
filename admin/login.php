<?php 
  session_start();
  require_once('../database/config.php');
  require_once('../database/functions.php');

  $email = $password = '';
  $loginErr = '';
  if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role=1;";
    $result = dbSelect($sql);
    if(count($result) > 0) {
      $_SESSION["isLogin"] = true;
      header('Location: home.php');
    } else {
      $loginErr = 'Email or password incorrect.';
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    
    <div id="container" class="d-flex justify-content-center align-items-center">
      <div class="col-sm-8 col-md-6 col-lg-4 mx-auto">
        <h1 class="text-center">Login to admin</h1>
        <form id="form-login" class="p-4 shadow" method="post">
          <small id="textHelp" class="form-text text-danger"><?=$loginErr?></small>
          <div class="form-group">
            <label for="email">Email address</label>
            <input value="<?=$email?>" type="email" name="email" class="form-control" id="email">
            <small id="emailHelp" class="form-text text-danger"></small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input value="<?=$password?>" type="password" name="password" class="form-control" id="password">
            <small id="passwordHelp" class="form-text text-danger"></small>
          </div>
          <button type="submit" class="btn">Login</button>
        </form> 
      </div>
    </div>   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $('form').submit(function() {
          if($('#email').val() == '' || $('#password').val() == '') {
            if($('#email').val() == '') {
              $('#emailHelp').text('Email is empty');
            }
            if($('#password').val() == '') {
              $('#passwordHelp').text('Password is empty');
            }
            return false;
          } else {
            return true;
          }
        });

        $('#email').change(function() {
          if($('#email').val() == '') {
            $('#emailHelp').text('Email is empty');
          } else {
            $('#emailHelp').empty();
          }
        });
        $('#password').change(function() {
          if($('#password').val() == '') {
            $('#passwordHelp').text('Password is empty');
          } else {
            $('#passwordHelp').empty();
          }
        });
      });
    </script>
  </body>
</html>