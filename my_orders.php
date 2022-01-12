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
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>my orders</title>
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

<div class="container">
  <div style="float:none;margin:auto" class="col-md-6"><br>
<div class="card">
  <center><div class="card-header"><b>My Orders</b></div></center>
  <?php 
$email=$_SESSION['waterlogin'];

$result=mysqli_query($conn,"SELECT * FROM orders WHERE email='$email'");
while($rows=mysqli_fetch_array($result)){

?>
  <div class="card-body">


<img style="width:160px;float:left" src="images/<?php echo $rows['pic'] ?>">

 <b>Quantity: <?php  echo $rows['quantity']  ?></b><br>
<b>Pieces:</b> <?php  echo $rows['pieces']  ?><br>
 <b>Total Amount:</b>Ksh <?php  echo $rows['total_amount']  ?><br>
   <b>Address:</b><?php  echo $rows['address']  ?><br>
 
 <b>Company:</b><?php  $company_id= $rows['company_id']; 
$resultcompany=mysqli_query($conn,"SELECT * FROM company WHERE company_id=$company_id");
$rowscompany=mysqli_fetch_array($resultcompany);

echo $rowscompany['name'];

 ?><br>

<b>Status:</b><?php  $status=$rows['status'];  

if($status==0){

echo "pending";

}else if($status==1){

echo "delivered";

}else{

  echo "canceled";
}

?>

<p>


</p>


</div>

<?php } ?>

</div>


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
