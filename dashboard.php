<?php
session_start();

  include('includes/config.php');
  if(!isset($_SESSION['adminlogin'])){
  
header('location:index.php');
}
$email=$_SESSION['adminlogin'];
$result=mysqli_query($conn,"SELECT company_id FROM company WHERE email='$email'");
$rows=mysqli_fetch_array($result);

$company_id= $rows['company_id'];





 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
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
  <?php  include('includes/header.php') ;   ?>

<section><br>
  <div class="container">
    <div  class="col-md-12">


<div  class="row">

 <div style="float:none;margin:auto" class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
No of sellers
<div align="right" style="font-weight:bold">
<?php
$result1=mysqli_query($conn,"SELECT count(company_id) AS total FROM company ");
$row1=mysqli_fetch_array($result1);
echo $row1['total'];
?>
</div>



</div>
      </div>
</div>



 <div style="float:none;margin:auto" class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
Registered Clients
<div align="right" style="font-weight:bold">
<?php
$result1=mysqli_query($conn,"SELECT count(id) AS total FROM clients ");
$row1=mysqli_fetch_array($result1);
echo $row1['total'];
?>
</div>



</div>
      </div>
</div>






















  <div style="float:none;margin:auto" class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
Open Orders
<div align="right" style="font-weight:bold">
<?php
$result1=mysqli_query($conn,"SELECT count(company_id) AS total FROM orders WHERE   status=0");
$row1=mysqli_fetch_array($result1);
echo $row1['total'];
?>
</div>



</div>
      </div>
</div>


<div style="float:none;margin:auto" class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
Delivered Orders

<div align="right" style="font-weight:bold">
<?php
$result1=mysqli_query($conn,"SELECT count(company_id) AS total FROM orders WHERE  status=1");
$row1=mysqli_fetch_array($result1);
echo $row1['total'];
?>
</div>

</div>
      </div>
</div>



<div class="col-md-3">
      <div class="card mb-4">
        <div class="card-body">
 Products
<div align="right" style="font-weight:bold">
<?php
$result1=mysqli_query($conn,"SELECT count(company_id) AS total FROM catalogue ");
$row1=mysqli_fetch_array($result1);
echo $row1['total'];
?>
</div>
</div>
      </div>
</div>







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
