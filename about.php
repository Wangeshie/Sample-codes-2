<?php
  include('includes/config.php');

  $cookie_name = "cart";

  $random=rand(1000,10000);
  $random_time=time();

  $random_all=$random.$random_time;

  $cookie_value = $random_all;

  if(!isset($_COOKIE[$cookie_name])) {
       setcookie($cookie_name, $cookie_value, time() + (8640000 * 30), "/"); // 86400 = 1 day

  }

  $cookieswater=$_COOKIE[$cookie_name];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    

<link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Start Top Nav -->
  <?php  include('includes/top-header.php') ;   ?>
  <?php  include('includes/header.php') ;   ?>


<div class="container"> <br>
<div style="margin:auto;float:none" class="col col-md-6">
<div class="card">
<center><div class="card-header">About Us</div> </center>
<div class="card-body">

BGD is a diverse platform for water sellers to have access to various clients.
All buyers needs are catered for in the platfrom in regards to their diverse water needs.

</div>



</div>



</div>




</div>




















    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
