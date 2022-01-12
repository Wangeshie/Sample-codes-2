<?php
session_start();
  include('includes/config.php');
if(!isset($_SESSION['waterlogin'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

}






  
  include('includes/cookies.php');

if(isset($_POST['submit'])){
  $email=$_POST['email'];


  $result=mysqli_query($conn,"SELECT email FROM clients WHERE email='$email'");
  if(mysqli_num_rows($result)==0){
  echo "<script>alert('Invalid email ')</script>";
  }else{
      echo "<script>alert('Valid email ')</script>";
}
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot password</title>
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
  <?php  include('includes/header.php') ;   ?><br>




<section>
  <div class="container">
    <div style="margin:auto;float:none" class="col-md-5">
  <div class="card">
    <div class="card-header">Forgot Password</div>
    <form method="post">
    <div class="card-body">
<label>Enter Email</label>
<input type="email" name="email" class="form-control">

    </div>
  <center><div class="card-footer"><button name="submit" class="btn btn-primary">Submit</button></div></center>
</form>

    </div>
  </div>





</section>



















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
