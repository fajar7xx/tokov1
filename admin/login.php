<?php

require_once '../config/config.php';

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <title>Login - Admin</title>

  <!-- Bootstrap core CSS -->
  <!-- <link href="bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">


  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="assets/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post">
    <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label class="sr-only">Email address</label>
    <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
    <label class="sr-only">Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
  <?php
  if(isset($_SESSION['admin'])){
    header('location:index.php');
  }

  if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);
    $pass = md5($pass);

    $query_login = "SELECT * FROM admin WHERE username = '$username' AND pass = '$pass'";
    $sql_login = mysqli_query($koneksi, $query_login) or die($mysqli_error($koneksi));

    if(mysqli_num_rows($sql_login)){
      $_SESSION['admin'] = mysqli_fetch_assoc($sql_login);
      echo '<script>alert("Anda Berhasil Login");</script>';
      echo '<meta http-equiv="refresh" content="1;url=index.php">';     
    }
    else{
      echo 'gagal';
    }
  }
  ?>
</body>


</html>