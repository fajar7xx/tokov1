<?php  
require_once "../config/config.php";
$admin = $_SESSION['admin']['nama_lengkap'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard Toko Online">
    <meta name="author" content="Fajar Setiawan Siagian">
    <title>Dashboard - Toko</title>
    <!-- Bootstrap core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <!-- fontawesome -->
    <link rel="stylesheet" href="../bower_components/fontawesome/css/all.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/admin.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Hi, <?=$admin;?></a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap btn btn-danger btn-sm btn-block my-1">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=orders">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=products">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=customers">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span data-feather="plus-circle"></span>
            </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-4">
        <?php  
        if(isset($_GET['page'])){
          if($_GET['page'] == "products"){
            include_once "products.php";
          }
          elseif($_GET['page'] == "orders"){
            include_once "orders.php";
          }
          elseif ($_GET['page'] == "customers") {
            include_once "customers.php";
          }
          elseif($_GET['page'] == "detail"){
            include "details.php";
          }
          elseif($_GET['page'] == "tambahproduk"){
            include "tambahproduk.php";
          }
          elseif($_GET['page'] == "hapusproduk"){
            include "hapusproduk.php";
          }
          elseif($_GET['page'] == "ubahproduk"){
            include "ubahproduk.php";
          }
        }
        else{
          include_once 'home.php';
        }

        ?>

         
        </main>
      </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.slim.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/feather-icons/dist/feather.min.js"></script>
    <script src="../bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="assets/js/admin.js"></script>
  </body>
</html>