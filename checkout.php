<?php  
require "config/config.php";
include_once "function/base_url.php";
include_once "function/rupiah.php";

if(!isset($_SESSION['pelanggan'])){
  echo"<script>alert('silahkan login dahulu');</script>";
  echo"<script>location='login.php';</script>";
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="toko online">
  <meta name="author" content="fajar siagian">
  <title>Checkout - Toko</title>


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
<!--   <nav class="site-header sticky-top py-1">
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


  <div class="container">
    <div class="row m-3">

  

      <h3 class="text-center mx-auto mt-4">Keranjang belanja</h3>


      <div class="table-responsive my-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subharga</th>
            </tr>
          </thead>
          <tbody>
          <?php

          if(empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])):
            ?>

            <tr>
              <td colspan="6" rowspan="" class="text-center">Tidak ada belanjaan</td>
            </tr>

          <?php
          endif;

          $totalBelanja = 0;

          $no = 1; 
          foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):
            // menampilkan produk yang sedang di perulangkan
            $query_produk = "SELECT * FROM products WHERE id_produk = '$id_produk'";
            $sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
            $produk = mysqli_fetch_assoc($sql_produk);
            $subharga = $produk['harga']*$jumlah;
                // $total_quantity += $produk[""];
            // $total_price += ($item["price"]*$item["quantity"]);
            ?>
            <tr>
              <td><?=$no++;?></td>
              <td><?=$produk['nm_products'];?></td>
              <td><?=rupiah($produk['harga']);?></td>
              <td><?=$jumlah;?></td>
              <td><?=rupiah($subharga);?></td>
            </tr>
            <?php
            $totalBelanja += $subharga;
          endforeach;
          ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" class="text-right">Total Belanja</td>
            <td colspan="2" class="font-weight-bold"> <?=rupiah($totalBelanja);?> </td>
          </tr>
        </tfoot>
      </table> 
      </div>

      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="<?=$_SESSION['pelanggan']['nm_pelanggan'];?>" readonly>
          </div>
          <div class="form-group col-md-6">
            <label>Telepon</label>
            <input type="text" class="form-control"value="<?=$_SESSION['pelanggan']['telp_pelanggan'];?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label >Ongkos Kirim</label>
            <select class="form-control" name="ongkir">
              <option value="">Pilih Ongkos Kirim</option>
              <?php  
              $query_ongkir = "SELECT * FROM ongkir";
              $sql_ongkir = mysqli_query($koneksi, $query_ongkir)or die(mysqli_error($koneksi));
              while( $perongkir = mysqli_fetch_assoc($sql_ongkir)):
              ?>
                <option value="<?=$perongkir['id_ongkir'];?>">
                  <?=$perongkir['nm_kota'] . " - " . rupiah($perongkir['tarif']);?>    
                </option>
              <?php  
              endwhile;
              ?>
            </select>
        </div>
        <div class="form-group">
          <label>Alamat Lengkap</label>
          <textarea name="alamat" class="form-control" rows="5" placeholder="masukkan alamat lengkap termasuk kode pos" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="checkout">Checkout</button>
      </form>

    
      <?php  
      require 'libs/vendor/autoload.php';

      use Ramsey\Uuid\Uuid;
      use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

      if(isset($_POST['checkout'])){

        $id_orders = Uuid::uuid4();

        $id_pelanggan =$_SESSION['pelanggan']['id_pelanggan'];
        $id_ongkir = $_POST['ongkir'];

        $query_ongkir1 = "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'";
        $sql_ongkir1 = mysqli_query($koneksi, $query_ongkir1)or die(mysqli_error($koneksi));
        $arrayOngkir = mysqli_fetch_assoc($sql_ongkir1); 
        $tarif =  $arrayOngkir['tarif'];
        $kota = $arrayOngkir['nm_kota'];


        $totalPembelian = $totalBelanja + $tarif;

        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

        // menyimpan data ke tabel pembelian
        $query_pembelian = "INSERT INTO orders(id_orders, id_pelanggan, id_ongkir, total_orders, kota, tarif, alamat_kirim) VALUES('$id_orders', '$id_pelanggan', '$id_ongkir', '$totalPembelian', '$kota', '$tarif', '$alamat')";
        $sql_pembelian = mysqli_query($koneksi, $query_pembelian);

        // mendapatkan id pembelian yang barusan terjadi
        // echo mysqli_insert_id($koneksi);
        foreach($_SESSION['keranjang'] as $id_produk => $jumlah){

          // mendapatkan data produk berdasarkan id_produk
         // menampilkan produk yang sedang di perulangkan
          $query_produk = "SELECT * FROM products WHERE id_produk = '$id_produk'";
          $sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));
          $per_produk = mysqli_fetch_assoc($sql_produk);

          $nama = $per_produk['nm_products'];
          $harga = $per_produk['harga'];
          $berat = $per_produk['berat'];

          $sub_berat = $per_produk['berat']*$jumlah;
          $sub_harga = $per_produk['harga']*$jumlah;



          $id_pembelian = Uuid::uuid4();
          $query1 = "INSERT INTO pembelian_produk(id_pembelian_produk,id_orders, id_produk, jumlah, nama, harga, berat, sub_berat, sub_harga) VALUES('$id_pembelian', '$id_orders','$id_produk', '$jumlah', '$nama', '$harga', '$berat', '$sub_berat', '$sub_harga')";
          $sql1 = mysqli_query($koneksi, $query1)or die(mysqli_error($koneksi));

          // echo $jumlah;
        }

        // mengosongkan keranjang belanja
        unset($_SESSION['keranjang']);

        // tampilan dialihkan ke halaman nota, nota dari pembelan yang barusan dibuat
        echo "<script>alert('Pembelian Berhasil');</script>";
        echo "<script>location='nota.php?id=$id_orders';</script>";
      }

      ?>

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
