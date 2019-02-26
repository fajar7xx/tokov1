<?php  
require "config/config.php";
include_once "function/base_url.php";
include_once "function/rupiah.php";
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
  <nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
      </a>
      <a class="py-2 d-none d-md-inline-block" href="index.php">Home</a>
      <a class="py-2 d-none d-md-inline-block" href="keranjang.php">Keranjang</a>
      <?php if(isset($_SESSION['pelanggan'])): ?>
        <a class="py-2 d-none d-md-inline-block" href="logout.php">logout</a>
      <?php else: ?>
        <a class="py-2 d-none d-md-inline-block" href="login.php">Login</a>
      <?php endif; ?>
      <a class="py-2 d-none d-md-inline-block" href="checkout.php">Checkout</a>
    </div>
  </nav>

  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal">Punny headline</h1>
      <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
      <a class="btn btn-outline-secondary" href="#">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

  <div class="container">
    <div class="row">
      <?php  
      $query_produk = "SELECT * FROM products";
      $sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
      while($produk = mysqli_fetch_assoc($sql_produk)):
      ?>
      <div class="col-md-3 mt-4">
        <div class="card">
          <img src="<?=base_url("img/".$produk['img']);?>" class="card-img-top gambar">
          <div class="card-body">
            <h5 class="card-title text-capitalize"><?=$produk['nm_products'];?></h5>
            <h6 class="card-subtitle mb-2 text-danger"><?=rupiah($produk['harga']);?></h6>
            <a href="beli.php?id=<?=$produk['id_produk'];?>" class="btn btn-outline-primary btn-sm">Beli</a>
            <a href="#" class="btn btn-outline-info btn-sm">Detail</a>
          </div>
        </div>
      </div>
      <?php  
      endwhile;
      ?>

      <!-- <div class="col-md-3 mt-4">
        <div class="card">
          <img src="img/t-shirt-mockup-design_15879-477.jpg" class="card-img-top  gambar">
          <div class="card-body">
            <h5 class="card-title text-capitalize">Produk 1</h5>
            <h6 class="card-subtitle mb-2 text-danger">Rp. 100.000,-</h6>
            <a href="#" class="btn btn-outline-primary btn-sm">Beli</a>
            <a href="#" class="btn btn-outline-info btn-sm">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-4">
        <div class="card">
          <img src="img/39952678_5f26631e-c27f-4b82-87d6-17c9fe239d5c_700_700.jpg" class="card-img-top  gambar">
          <div class="card-body">
            <h5 class="card-title text-capitalize">Produk 1</h5>
            <h6 class="card-subtitle mb-2 text-danger">Rp. 100.000,-</h6>
            <a href="#" class="btn btn-outline-primary btn-sm">Beli</a>
            <a href="#" class="btn btn-outline-info btn-sm">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-4">
        <div class="card">
          <img src="img/4944567_6e5c8712-6e45-418a-8bf4-ecddfb31859e_700_700.jpg" class="card-img-top  gambar">
          <div class="card-body">
            <h5 class="card-title text-capitalize">Produk 1</h5>
            <h6 class="card-subtitle mb-2 text-danger">Rp. 100.000,-</h6>
            <a href="#" class="btn btn-outline-primary btn-sm">Beli</a>
            <a href="#" class="btn btn-outline-info btn-sm">Detail</a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-4">
        <div class="card">
          <img src="img/5157284_9f8d7def-309b-442b-96b9-b5a5f37b8eda_720_720.jpg" class="card-img-top  gambar">
          <div class="card-body">
            <h5 class="card-title text-capitalize">Produk 1</h5>
            <h6 class="card-subtitle mb-2 text-danger">Rp. 100.000,-</h6>
            <a href="#" class="btn btn-outline-primary btn-sm">Beli</a>
            <a href="#" class="btn btn-outline-info btn-sm">Detail</a>
          </div>
        </div>
      </div>   -->    



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
