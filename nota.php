<?php  
require "config/config.php";
include_once "function/base_url.php";
include_once "function/rupiah.php";
include_once "function/tanggal.php";

$id = $_GET['id'];
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="toko online">
  <meta name="author" content="fajar siagian">
  <title>Nota Toko · Bootstrap</title>


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
<link rel="stylesheet" href="assets/css/nota.css">
</head>

<body>
  <!-- <nav class="site-header sticky-top py-1">
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
  </nav> -->
  <?php include_once "includes/menu.php"; ?>

  <div class="container mt-4 mb-4">

    <!-- nota disini -->
    <?php  
    $query_detail = "SELECT
                        *
                    FROM
                        `orders`
                    LEFT JOIN customers USING(id_pelanggan)
                    WHERE id_orders = '$id'";
    $sql_detail = mysqli_query($koneksi, $query_detail)or die(mysqli_error($koneksi));
    $detail = mysqli_fetch_assoc($sql_detail);
    ?>

    <!-- <pre>
      <?php print_r($detail); ?>
    </pre> -->

    <div class="card">
      <div class="card-header">
        Invoice
        <strong>01/01/01/2018</strong> 
        <!-- <span class="float-right"> <strong>Status:</strong> Pending</span> -->

      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h6 class="mb-3">From:</h6>
            <div>
              <strong>Toko Online</strong>
            </div>
            <div>Jalan Medan</div>
            <div>Sumatera Utara, Indonesia</div>
            <div>Email: info@toko.com</div>
            <div>Phone: +62 1234 1234</div>
          </div>

          <div class="col-sm-6">
            <h6 class="mb-3">To:</h6>
            <div>
              <strong><?=$detail['nm_pelanggan'];?></strong>
            </div>
            <div><?=$detail['email_pelanggan'];?></div>
            <div><?=$detail['telp_pelanggan'];?></div>
            <div>Tanggal Pembelian : <?=tanggal($detail['created_at']);?></div>
            <div>Tujuan : <?=$detail['kota'];?></div>
            <div>Tarif : <?=rupiah($detail['tarif']);?></div>
            <div>Alamat : <?=$detail['alamat_kirim'];?></div>
          </div>



        </div>

        <div class="table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>nama Produk</th>

                <th class="right">Harga</th>
                <th class="center">Qty</th>
                <th class="right">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $no=1;
              $query_produk = "SELECT
                                  *
                              FROM
                                  `pembelian_produk`
                              WHERE
                                  id_orders = '$id'";
              $sql_produk = mysqli_query($koneksi, $query_produk)or die(mysqli_error($koneksi));
              while($produk = mysqli_fetch_assoc($sql_produk)):

              ?>
                <tr>
                  <td class="center"><?=$no++;?></td>
                  <td class="left strong"><?=$produk['nama'];?></td>
                  <td class="right"><?=rupiah($produk['harga']);?></td>
                  <td class="center"><?=$produk['jumlah'];?></td>
                  <td class="right"><?=rupiah($produk['sub_harga']);?></td>
                </tr>
              <?php  
              endwhile;
              ?>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-5">
            <div class="alert alert-primary" role="alert">
              Transfer ke no. rek : 12345678
              <br>An : punya toko
              <br>cab kota medan
            </div>   
          </div>

          <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
              <tbody>
               <tr>
                <td class="left">
                  <strong>Total</strong>
                </td>
                <td class="right">
                  <strong><?=rupiah($detail['total_orders']);?></strong>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>

    </div>
  </div>
</div>


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
