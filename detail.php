<?php  
require "config/config.php";
include_once "function/base_url.php";
include_once "function/rupiah.php";

$id = $_GET['id'];

$query_produk = "SELECT * FROM products WHERE id_produk = '$id'";
$sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
$produk = mysqli_fetch_assoc($sql_produk);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="toko online">
  <meta name="author" content="fajar siagian">
  <title>Detail Toko · Bootstrap</title>


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

  <div class="container">
    <div class="row mt-4 mb-4">
      <div class="col-md-6">
        <img src="img/<?=$produk['img'];?>" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2><?=$produk['nm_products'];?></h2>
        <h5><?=rupiah($produk['harga']);?></h5>
        <p>
          <?=$produk['deskripsi'];?>
        </p>
        <form method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number" name="jumlah" min="1" class="form-control">
              <div class="input-group-append">
                <button class="btn btn-primary" name="beli">Beli</button>
              </div>
            </div>
          </div>
        </form>
        
        <?php  
        if(isset($_POST['beli'])){
          $jumlah = $_POST['jumlah'];
          $_SESSION['keranjang'][$id] = $jumlah;

           echo"<script>alert('prduk telah di tambahkan');</script>";
           echo"<script>location='keranjang.php';</script>";
        }
        ?>


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
