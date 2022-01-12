<?php
session_start();
  include('includes/config.php');


if(!isset($_SESSION['waterlogin'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];
header('location:login.php');
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

$email=$_SESSION['waterlogin'];

if(isset($_POST['update'])){
   
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$mobile_number=$_POST['mobile_number'];
 
 if($_POST['password']==""){
  $password=$_POST['password2'];
 }else{

$password=md5($_POST['password']);

 }



$update=mysqli_query($conn,"UPDATE clients SET first_name='$first_name',last_name='$last_name',mobile_number='$mobile_number',password='$password' where email='$email'");

if($update){
echo "<script> alert ('Profile Updated Succesffully')</script>";

}else{

  echo "<script> alert ('An error occurred')</script>";
}




}



 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My profile</title>
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

<section>

<div style="float:none;margin:auto" class="col col-md-4">

<br><br>

<div class="card" style="margin-bottom:1.5em">
  <center><div class="card-header"><h5>Update Profile</h5></div></center>
  <?php
 
$result=mysqli_query($conn,"SELECT * FROM clients where email='$email' ");
while($rows=mysqli_fetch_array($result)){

   ?>
  <div class="card-body">
    <form method="post">
    <label>First Name</label>
      <input name="first_name" value="<?php echo $rows['first_name'] ?>" class="form-control" type="text" >
      
      <label>Last Name</label>
      <input name="last_name" value="<?php echo $rows['last_name'] ?>" class="form-control" type="text" >

      <label>Phone number</label>
        <input  name="mobile_number" value="<?php echo $rows['mobile_number'] ?>" class="form-control" type="text" >
       

      
     <label>Password</label>
          <input name="password"  class="form-control" type="password" >

          <input hidden name="password2" value="<?php echo $rows['password'] ?>" class="form-control" type="password" >



<label>Email</label>
          <input disabled value="<?php echo $rows['email'] ?>" class="form-control" type="text" >

          <br>
        <center>  <button name="update" class="btn btn-primary">Update</button><br>

     
      </center>
</form>

</div>

</div>

<?php } ?>

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
