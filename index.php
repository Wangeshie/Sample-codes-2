<?php
  include('includes/config.php');
  include('includes/cookies.php');

if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=md5($_POST['password']);

$result=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email'");
if(mysqli_num_rows($result)==0){
echo "<script>alert('Invalid email or password')</script>";
}else{

$result1=mysqli_fetch_array($result);
$dbpasssword=$result1['password'];

if($dbpasssword==$password){
  $email=$_POST['email'];
  session_start();

$_SESSION['adminlogin']=$_POST['email'];

 header('location:dashboard.php');


}else{


echo "<script>alert('Invalid email or password')</script>";


}










}




}







 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    

<link rel="stylesheet" href="../assets/bootstrap.css">
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
    <div style="float:none;margin:auto" class="col-md-5">
  <div class="card">
  <center>  <div class="card-header"><h5>Admin Log In</h5></div> </center>
    <div class="card-body">
      <form method="post">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        <label>Password</label>
        <input type="password" name="password" class="form-control">



    </div>
<center><div class="card-footer"><button  id="submit" name="submit" class="btn btn-primary">Log In</button><br><br>
</center>
</div>
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
