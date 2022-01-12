<?php
session_start();
  include('includes/config.php');
 if(!isset($_SESSION['waterlogin'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

}
$id=$_GET['id'];

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

$company_id=$_POST['company_id'];
$pic=$_POST['pic'];
$price=$_POST['price'];
$pieces=$_POST['pieces'];
$quantity=$_POST['quantity'];
$total_amount=$price*$pieces;

$addcart=mysqli_query($conn,"INSERT INTO cart(cookies,pieces,quantity,company_id,pic,total_amount,price)VALUES('$cookieswater','$pieces','$quantity','$company_id','$pic','$total_amount','$price')");

if($addcart){

}

}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
<div style="float:none;margin:auto" class="col-md-6"><br>
<div class="card">
  <center><div class="card-header"><h4>Product Description</h4></div></center>
  <div class="card-body">
    <?php
    $result=mysqli_query($conn,"SELECT * FROM company WHERE company_id=$id");
$result1=mysqli_fetch_array($result);
echo $result1['description'];

     ?>

  </div>
</div>
</div><br>

<!-- products -->
<div class="container">
<div class="row">
<!-- cardstart -->
<!-- 500 ml-->
<?php
$id=$_GET['id'];
    $result2=mysqli_query($conn,"SELECT * FROM catalogue WHERE company_id=$id");
while($rows2=mysqli_fetch_array($result2)){

     ?>
<div class="col-md-4">
  <div class="card">
<center><div class="card-header"><b><?php  echo $rows2['quantity'] ?></b></div></center>
<div class="card-body">
<center><img  style="width:250px" src="images/<?php echo $rows2['image']; ?>" class="card-img-top"><br><br>

 <b>Price:</b> Ksh<?php echo $rows2['price'] ?></center>
</div>
<div class="card-footer">
  <form method="post">
    <input hidden name="pic" value="<?php echo $rows2['image'] ?>" >
    <input hidden name="price" value="<?php echo $rows2['price'] ?>" >
    <input hidden name="company_id" value="<?php echo $rows2['company_id'] ?>">
    <input hidden name="quantity" value="quantity">
<b>Pieces:</b><input class="form-control"  value="1" type="number" name="pieces"><br>

<center><button name="submit" class="btn btn-primary">Add to Cart </div>
</form>

  </div>

</div>

<?php } ?>



</div><br>

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
