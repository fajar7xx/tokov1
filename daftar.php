<?php  
require "config/config.php";
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="toko online">
  <meta name="author" content="fajar siagian">
  <title>Toko · Bootstrap</title>


  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="assets/css/produk.css" rel="stylesheet">
</head>

<body>
  <?php include_once "includes/menu.php"; ?>

  <div class="container">
    <div class="row">
      <div class="card my-4 mx-auto" style="width: 75%;">
        <div class="card-header">Pendaftran Baru</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group row">
              <label  class="col-sm-3 label-form-row">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-3 label-form-row">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-3 label-form-row">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name="pass" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-3 label-form-row">Telp/HP</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="tel" required>
              </div>
            </div>
            <div class="form-group row">
              <label  class="col-sm-3 label-form-row">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat" class="form-control" rows="4"></textarea>
              </div>
            </div>
            <button class="btn btn-primary btn-block float-right" name="daftar">Daftar</button>
          </form>

          <?php
          require 'libs/vendor/autoload.php';

          use Ramsey\Uuid\Uuid;
          use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
  
          if(isset($_POST['daftar'])){
            $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
            $email = mysqli_real_escape_string($koneksi, $_POST['email']);
            $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);
            $tel = mysqli_real_escape_string($koneksi, $_POST['tel']);
            $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

            $query_pelanggan = "SELECT * FROM customers WHERE email_pelanggan = '$email'";
            $sql_pelanggan = mysqli_query($koneksi, $query_pelanggan)or die(mysqli_error($koneksi));

            if(mysqli_num_rows($sql_pelanggan) != 0){
              echo"<script>alert('Email Sudah Terdaftar pada sistem');</script>";
              echo"<script>location='daftar.php';</script>";
            }
            else{
              $id = Uuid::uuid4();
              $pass = md5($pass);
              $query_daftar = "INSERT INTO `customers`(
                                  `id_pelanggan`,
                                  `email_pelanggan`,
                                  `pass_pelanggan`,
                                  `nm_pelanggan`,
                                  `telp_pelanggan`,
                                  `alamat`
                              )
                              VALUES(
                                  '$id',
                                  '$email',
                                  '$pass',
                                  '$nama',
                                  '$tel',
                                  '$alamat'

                              )";
              $sql_daftar = mysqli_query($koneksi, $query_daftar)or die(mysqli_error($koneksi));

              echo"<script>alert('pendaftaran berhasil !!!');</script>";
              echo"<script>location='login.php';</script>";
            }
          }

          ?>
        </div>
      </div>
    </div>
  </div><!-- container end -->


  <footer class="container py-5">
    <div class="row">
      <div class="col-12 col-md">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        <small class="d-block mb-3 text-muted">&copy; 2019</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Business</a></li>
          <li><a class="text-muted" href="#">Education</a></li>
          <li><a class="text-muted" href="#">Government</a></li>
          <li><a class="text-muted" href="#">Gaming</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
  <script src="bower_components/jquery/dist/jquery.slim.min.js"></script>
  <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.slim.min.js"><\/script>')</script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
