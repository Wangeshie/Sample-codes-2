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

if(isset($_POST['submit'])){


$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
  $address = $_POST['address'];
  $pmode = $_POST['pmode'];

$stmt =mysqli_query($conn,"insert into orders(id,name,email,phone_number,pmode,pieces,quantity,price,company_id,pic,total_amount,address,status) select '','$name','$email','$phone_number','$pmode', pieces,quantity,price,company_id,pic,total_amount,'$address',0  from cart where cookies='$cookieswater';");

if($stmt){

mysqli_query($conn,"DELETE FROM cart WHERE cookies='$cookieswater'");

    echo "<script> alert('order placed successfully');
    window.location.href='my_orders.php'

    </script>";
    
}else{

    echo "<script> alert('Something went wrong') </script>";
}



}



 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
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
        <div style="margin:auto;float:none" class="col-md-5">



            <?php
$email=$_SESSION['waterlogin'];



$result=mysqli_query($conn,"SELECT * FROM clients WHERE email='$email'");
$rows=mysqli_fetch_array($result);

?>
<form method="post">
<input hidden name="name" value="<?php echo $rows['first_name']?> <?php echo $rows['last_name']?>">
<input hidden name="email" value="<?php echo $email ?>" >
<input  hidden name="phone_number" value="<?php echo $rows['mobile_number']?>" >
<br>

<center><label><b><h5>Enter Delivery Address</h5></b></label></center>
<textarea style="border:1px black solid" placeholder="e.g Kesses town Uasin Gishu County" class="form-control"  name="address">


</textarea><br>

<center><label><b><h5>Payment Mode</h5></b></label></center>
<select class="form-control" name="pmode">
<option value="cash on delivery">Cash on delivery </option>

    </select>
<br>
<center><button class="btn btn-primary" name="submit">Place Order</button></center>
</form>









</section>


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
