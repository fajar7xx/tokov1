<?php
$id = $_GET['id'];  

$query_produk = "SELECT * FROM products WHERE id_produk = '$id'";
$sql_produk = mysqli_query($koneksi, $query_produk) or die(mysqli_error($koneksi));

$data = mysqli_fetch_assoc($sql_produk);
// print_r($data);

$fotoproduk = $data['img'];

if(file_exists("../img/$fotoproduk")){
	unlink("../img/$fotoproduk");
}

$qHapus = "DELETE FROM products WHERE id_produk = '$id'";
$sHapus = mysqli_query($koneksi, $qHapus) or die(mysqli_error($koneksi));

echo "<script>alert('Produk telah terhapus');</script>
<script>location='index.php?page=products';</script>";

?>
