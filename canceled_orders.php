<?php
session_start();
  include('includes/config.php');

if(!isset($_SESSION['adminlogin'])){

header('location:index.php');

}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cancelled orders</title>
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

<section>
  <div class="container-fluid">
  <div class="col-md-12"><br>
                           <center> <h1 class="page-header">Canceled Orders</h1></center>
                        
                        <div><center>
                        <a class="btn btn-primary" href="open_orders.php">Open Orders</a>
                        <a class="btn btn-success" href="delivered_orders.php">Delivered Orders</a>
                        <a class="btn btn-danger" href="canceled_orders.php">Canceled Orders</a></center></div><br>
                   
<table class="table table-bordered">
  <tr>
    <td style="font-weight:bold">#</td>
<td style="font-weight:bold">Company</td>
    <td style="font-weight:bold">Customer Email</td>
    <td style="font-weight:bold">Customer Phone No</td>
    <td style="font-weight:bold">Address</td>
    <td style="font-weight:bold">Product</td>
    <td style="font-weight:bold">Price</td>
    <td style="font-weight:bold">Pieces</td>
    <td style="font-weight:bold">Amount</td>
    <td style="font-weight:bold">Mode</td>
    <td style="font-weight:bold">Ordered On</td>
      

  </tr>
  <?php
$result=mysqli_query($conn,"SELECT * FROM orders Where status=2  ORDER BY date_placed desc");
$i=0;
while($rows=mysqli_fetch_array($result)){
  $i++;

   ?>
  <tr>

<td><?php echo $i ?> </td>

<td><?php $cid=$rows['company_id'];

$resultcid=mysqli_query($conn,"SELECT * FROM company Where company_id=$cid ");
$rowcid=mysqli_fetch_array($resultcid);

echo $rowcid['name'];



?> 


</td>
<td><?php echo $rows['email'] ?> </td>
<td><?php echo $rows['phone_number'] ?> </td>
<td><?php echo $rows['address'] ?> </td>
<td><?php echo $rows['quantity'] ?> </td>
<td><?php echo $rows['price'] ?> </td>
<td><?php echo $rows['pieces'] ?> </td>
<td><?php echo $rows['total_amount'] ?> </td>
<td><?php echo $rows['pmode'] ?> </td>
<td><?php echo $rows['date_placed'] ?> </td>
</tr>
    

<?php } ?>


</table>

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
