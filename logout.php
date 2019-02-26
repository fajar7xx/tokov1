<?php

session_start();
session_destroy();
unset($_SESSION['pelanggan']);
header('location:index.php');
exit();

?>