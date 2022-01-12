<?php
session_start();
  include('includes/config.php');
if(!isset($_SESSION['waterlogin'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

}

  $cookie_name = "cart";

  $random=rand(1000,10000);
  $random_time=time();

  $random_all=$random.$random_time;

  $cookie_value = $random_all;

  if(!isset($_COOKIE[$cookie_name])) {
       setcookie($cookie_name, $cookie_value, time() + (8640000 * 30), "/"); // 86400 = 1 day

  }

  $cookieswater=$_COOKIE[$cookie_name];



if(isset($_POST['submit'])){

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$password=md5($_POST['password']);

$result=mysqli_query($conn,"INSERT INTO clients (first_name,last_name,email,mobile_number,password)
VALUES('$first_name','$last_name','$email','$phone_number','$password')");

if($result){
echo "<script>alert('Registration Successful')</script>";
}else{

echo "<script>alert('Something went wrong')</script>";

}





}






 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BGD sign up</title>
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
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_email.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<body>
    <!-- Start Top Nav -->
  <?php  include('includes/top-header.php') ;   ?>
  <?php  include('includes/header.php') ;   ?><br>

<section>
<div class="container">
<div  style="margin:auto;float:none" class="col-md-5">
<div class="card">
  <center><div class="card-header"><h5>Sign Up</h5></div></center>
  <div class="card-body">
    <form method="post">
      <label>First Name</label>
      <input type="text" class="form-control" name="first_name" required>

      <label>Second Name</label>
      <input type="text" class="form-control" name="last_name" required>

      <label>Email</label>
      <input type="email"  id="emailid" class="form-control" name="email" onchange="checkAvailability()" required>
      <center><span id="user-availability-status" style="font-size:12px;"></span> </center><br>

      <label>Phone Number</label>
      <input type="number" class="form-control" name="phone_number" required>

      <label>Password</label>
     password <input type="password" class="form-control" name="password" required>




  </div>
<center><div class="card-footer"><button  id="submit" name="submit" class="btn btn-primary">Sign Up</button></div> </center>

<center><p><a href="login.php">Log in</p></center>

</form>
  </div>
</div><br><br>








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
