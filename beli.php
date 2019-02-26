<?php
require_once "config/config.php";

$id = $_GET['id'];


// var_dump($id);
// jika sudah ada produk itu di keranjang maka
// prduk akan ditambah satu
if(isset($_SESSION['keranjang'][$id])){
	$_SESSION['keranjang'][$id] += 1;
}
// selain itu belum ada di keranjang
else{
	$_SESSION['keranjang'][$id] = 1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// 
echo "<script>alert('produk telah ditambahkan');</script>";
echo "<script>location='keranjang.php';</script>";
?>



