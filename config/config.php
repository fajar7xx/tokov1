<?php  
// file konfigurasi dasar sistem 
// termasuk database dan lain yang berhubungan dengan
// pengaturan pada sistem
date_default_timezone_set('Asia/Jakarta');
ob_start();
session_start();


$host = "localhost";
$username = "root";
$password = ""; //biarkan kosong sebagai password default pada phpmyadmin
$db = "toko"; //nama database pasa sistem kita

$koneksi = mysqli_connect($host, $username, $password, $db);

// cek jika koneksi jalan atau tidak
// maka akan muncul peringatan jika terjadi kesalahan
if(!$koneksi){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


// echo 'sukses book';

// kumpulan function letakkan disini
include_once "../function/rupiah.php";
include_once "../function/base_url.php";
?>